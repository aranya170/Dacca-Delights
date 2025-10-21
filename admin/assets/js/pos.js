// Dacca Delights POS System JavaScript - Fixed Version
// Created: October 12, 2025

class POSSystem {
  constructor() {
    this.cart = [];
    this.menuItems = [];
    this.categories = [];
    this.currentPaymentMethod = "cash";
    this.vatRate = 0;
    this.isProcessing = false;
    this.salesChart = null;
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.setCurrentDate();
    this.loadMenu();
  }

  setupEventListeners() {
    // Search functionality
    const searchInput = document.getElementById("search-input");
    if (searchInput) {
      searchInput.addEventListener("input", (e) => {
        this.filterMenu(e.target.value);
      });
    }

    // Category filter
    const categoryFilter = document.getElementById("category-filter");
    if (categoryFilter) {
      categoryFilter.addEventListener("change", (e) => {
        this.filterByCategory(e.target.value);
      });
    }

    // Payment method buttons - Use event delegation
    document.addEventListener("click", (e) => {
      if (e.target.classList.contains("payment-method-btn")) {
        this.selectPaymentMethod(e.target.dataset.method);
      }
    });

    // Amount paid input
    const amountPaidInput = document.getElementById("amount-paid");
    if (amountPaidInput) {
      amountPaidInput.addEventListener("input", (e) => {
        this.calculateChange();
      });
    }

    // Order actions - Use event delegation for dynamic buttons
    document.addEventListener("click", (e) => {
      if (
        e.target.id === "clear-order-btn" ||
        e.target.closest("#clear-order-btn")
      ) {
        e.preventDefault();
        this.clearOrder();
      }

      if (
        e.target.id === "process-order-btn" ||
        e.target.closest("#process-order-btn")
      ) {
        e.preventDefault();
        if (!this.isProcessing) {
          this.processOrder();
        }
      }

      // Cart item buttons
      if (
        e.target.classList.contains("remove-item-btn") ||
        e.target.closest(".remove-item-btn")
      ) {
        e.preventDefault();
        const btn = e.target.classList.contains("remove-item-btn")
          ? e.target
          : e.target.closest(".remove-item-btn");
        const itemId = parseInt(btn.dataset.id);
        this.removeFromCart(itemId);
      }

      if (
        e.target.classList.contains("qty-btn") ||
        e.target.closest(".qty-btn")
      ) {
        e.preventDefault();
        const btn = e.target.classList.contains("qty-btn")
          ? e.target
          : e.target.closest(".qty-btn");
        const itemId = parseInt(btn.dataset.id);
        const action = btn.dataset.action;
        const item = this.cart.find((cartItem) => cartItem.id === itemId);
        if (item) {
          const newQuantity =
            action === "increase"
              ? item.quantity + 1
              : Math.max(item.min_quantity, item.quantity - 1);
          this.updateCartItemQuantity(itemId, newQuantity);
        }
      }
    });

    // Modal actions
    const closeReceiptBtn = document.getElementById("close-receipt-btn");
    if (closeReceiptBtn) {
      closeReceiptBtn.addEventListener("click", () => {
        this.closeReceiptModal();
      });
    }

    const printReceiptBtn = document.getElementById("print-receipt-btn");
    if (printReceiptBtn) {
      printReceiptBtn.addEventListener("click", () => {
        this.printReceipt();
      });
    }

    // Reports modal
    const reportsBtn = document.getElementById("reports-btn");
    if (reportsBtn) {
      reportsBtn.addEventListener("click", () => {
        this.showReportsModal();
      });
    }

    const closeReportsBtn = document.getElementById("close-reports-btn");
    if (closeReportsBtn) {
      closeReportsBtn.addEventListener("click", () => {
        this.closeReportsModal();
      });
    }

    const reportTypeFilter = document.getElementById("report-type-filter");
    if (reportTypeFilter) {
      reportTypeFilter.addEventListener("change", () => {
        this.loadReport();
      });
    }

    const reportDateFilter = document.getElementById("report-date-filter");
    if (reportDateFilter) {
      reportDateFilter.addEventListener("change", () => {
        this.loadReport();
      });
    }
  }

  setCurrentDate() {
    const now = new Date();
    const dateStr = now.toLocaleDateString("en-GB", {
      day: "2-digit",
      month: "short",
      year: "numeric",
    });
    const currentDateEl = document.getElementById("current-date");
    if (currentDateEl) {
      currentDateEl.textContent = dateStr;
    }
  }

  async loadMenu() {
    try {
      console.log("Loading menu...");

      // Check if API is available, if not use fallback data
      let data;
      try {
        const response = await fetch("api/menu.php");
        if (!response.ok) {
          throw new Error("API not available");
        }
        data = await response.json();
      } catch (apiError) {
        console.warn("API not available, using fallback data");
        data = this.getFallbackMenuData();
      }

      if (data.success || data.categories) {
        this.menuItems = data.menu_items || data.items || [];
        this.categories = data.categories || [];
        this.renderCategories();
        this.renderMenu();
      } else {
        console.error("Failed to load menu:", data);
        this.showError("Failed to load menu");
      }
    } catch (error) {
      console.error("Error loading menu:", error);
      // Use fallback data
      const fallbackData = this.getFallbackMenuData();
      this.menuItems = fallbackData.menu_items;
      this.categories = fallbackData.categories;
      this.renderCategories();
      this.renderMenu();
    } finally {
      const loadingEl = document.getElementById("loading-menu");
      if (loadingEl) {
        loadingEl.style.display = "none";
      }
    }
  }

  getFallbackMenuData() {
    // Fallback data in case API is not available
    return {
      success: true,
      categories: [
        {
          id: "breads",
          name: "Breads",
          description: "Fresh baked breads and loaves",
          icon: "🍞",
        },
        {
          id: "buns",
          name: "Buns & Rolls",
          description: "Burger buns, rolls and small breads",
          icon: "🥖",
        },
        {
          id: "bagels",
          name: "Bagels",
          description: "Traditional and flavored bagels",
          icon: "🥯",
        },
        {
          id: "desserts",
          name: "Desserts",
          description: "Sweet treats, cookies and brownies",
          icon: "🧁",
        },
        {
          id: "tarts",
          name: "Tarts & Pastries",
          description: "Delicious tarts and pastries",
          icon: "🥧",
        },
      ],
      menu_items: [
        {
          id: 1,
          name: "Sandwich Bread",
          category_id: "breads",
          price: 250,
          description: "Fresh sandwich bread",
          size_info: "(~ 1000 gm)",
          min_quantity: 1,
          is_available: "1",
          category_name: "Breads",
        },
        {
          id: 2,
          name: "Sourdough Bread",
          category_id: "breads",
          price: 350,
          description: "Fresh sourdough bread",
          size_info: "(~ 650 gm)",
          min_quantity: 1,
          is_available: "1",
          category_name: "Breads",
        },
        {
          id: 3,
          name: "Baguette",
          category_id: "breads",
          price: 300,
          description: "Fresh baguette",
          size_info: "(~ 400 gm)",
          min_quantity: 1,
          is_available: "1",
          category_name: "Breads",
        },
        {
          id: 4,
          name: "Burger Bun",
          category_id: "buns",
          price: 50,
          description: "Fresh burger bun",
          size_info: "(~ 90 gm) (minimum 6 pieces)",
          min_quantity: 6,
          is_available: "1",
          category_name: "Buns",
        },
        {
          id: 5,
          name: "Plain Bagel",
          category_id: "bagels",
          price: 80,
          description: "Fresh plain bagel",
          size_info: "(~ 90 gm)",
          min_quantity: 1,
          is_available: "1",
          category_name: "Bagels",
        },
        {
          id: 6,
          name: "Chocolate Brownie",
          category_id: "desserts",
          price: 115,
          description: "Fresh chocolate brownie",
          size_info: "",
          min_quantity: 1,
          is_available: "1",
          category_name: "Desserts",
        },
        {
          id: 7,
          name: "Mango Cheese Tart",
          category_id: "tarts",
          price: 135,
          description: "Fresh mango cheese tart",
          size_info: "",
          min_quantity: 1,
          is_available: "1",
          category_name: "Tarts",
        },
      ],
    };
  }

  renderCategories() {
    const categoryFilter = document.getElementById("category-filter");
    const categoryPills = document.getElementById("category-pills");

    if (!categoryFilter || !categoryPills) return;

    // Clear existing options except first one
    categoryFilter.innerHTML = '<option value="">All Categories</option>';

    // Populate filter dropdown
    this.categories.forEach((cat) => {
      const option = document.createElement("option");
      option.value = cat.id;
      option.textContent = cat.name;
      categoryFilter.appendChild(option);
    });

    // Create category pills
    categoryPills.innerHTML = "";

    // Add "All" pill first
    const allPill = document.createElement("button");
    allPill.className =
      "category-pill bg-gold text-white px-4 py-2 rounded-full text-sm font-medium btn-hover active";
    allPill.innerHTML = "🍽️ All Items";
    allPill.addEventListener("click", (e) => {
      e.preventDefault();
      this.filterByCategory("");
    });
    categoryPills.appendChild(allPill);

    this.categories.forEach((cat) => {
      const pill = document.createElement("button");
      pill.className =
        "category-pill bg-white border-2 border-gold text-warm-brown px-4 py-2 rounded-full text-sm font-medium btn-hover";
      pill.innerHTML = `${cat.icon} ${cat.name}`;
      pill.addEventListener("click", (e) => {
        e.preventDefault();
        this.filterByCategory(cat.id);
      });
      categoryPills.appendChild(pill);
    });
  }

  renderMenu(items = this.menuItems) {
    const menuGrid = document.getElementById("menu-grid");
    if (!menuGrid) return;

    menuGrid.innerHTML = "";

    if (!items || items.length === 0) {
      menuGrid.innerHTML =
        '<div class="col-span-full text-center py-8 text-gray-500">No menu items available</div>';
      return;
    }

    items.forEach((item) => {
      if (item.is_available === "0" || item.is_available === false) return;

      const menuCard = document.createElement("div");
      menuCard.className =
        "menu-item bg-white rounded-lg shadow-md p-4 transition-transform duration-200 hover:shadow-lg hover:scale-105";

      const price = parseFloat(item.price);
      const priceStr = price > 0 ? `৳${price.toFixed(2)}` : "Price TBD";
      const minQtyNote =
        item.min_quantity && item.min_quantity > 1
          ? `<p class="text-xs text-red-500 mt-1">Min. ${item.min_quantity} pieces</p>`
          : "";

      menuCard.innerHTML = `
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-sm text-warm-brown flex-1 pr-2">${
                      item.name
                    }</h3>
                    <span class="text-lg font-bold text-bakery-orange whitespace-nowrap">${priceStr}</span>
                </div>
                <p class="text-xs text-gray-600 mb-2 line-clamp-2">${
                  item.description || ""
                }</p>
                ${
                  item.size_info
                    ? `<p class="text-xs text-gray-500 mb-1">${item.size_info}</p>`
                    : ""
                }
                ${minQtyNote}
                <div class="flex justify-between items-center mt-3">
                    <span class="text-xs bg-gray-100 px-2 py-1 rounded">${
                      item.category_name || "Item"
                    }</span>
                    <button class="add-to-cart-btn bg-bakery-green text-white px-3 py-1 rounded text-sm btn-hover" 
                            data-item-id="${item.id}">
                        <i class="fas fa-plus mr-1"></i>Add
                    </button>
                </div>
            `;

      // Add click event to the add button
      const addBtn = menuCard.querySelector(".add-to-cart-btn");
      addBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log("Adding item to cart:", item);
        this.addToCart(item);
      });

      menuGrid.appendChild(menuCard);
    });
  }

  filterMenu(searchTerm) {
    if (!this.menuItems) return;

    const filtered = this.menuItems.filter(
      (item) =>
        item.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        (item.description &&
          item.description.toLowerCase().includes(searchTerm.toLowerCase()))
    );
    this.renderMenu(filtered);
  }

  filterByCategory(categoryId) {
    // Update category pills active state
    document.querySelectorAll(".category-pill").forEach((pill) => {
      pill.classList.remove("bg-gold", "text-white", "active");
      pill.classList.add(
        "bg-white",
        "border-2",
        "border-gold",
        "text-warm-brown"
      );
    });

    if (categoryId === "") {
      document
        .querySelector(".category-pill")
        .classList.remove(
          "bg-white",
          "border-2",
          "border-gold",
          "text-warm-brown"
        );
      document
        .querySelector(".category-pill")
        .classList.add("bg-gold", "text-white", "active");
      this.renderMenu();
    } else {
      const filtered = this.menuItems.filter(
        (item) => item.category_id === categoryId
      );
      this.renderMenu(filtered);

      // Update active pill
      const targetPill = Array.from(
        document.querySelectorAll(".category-pill")
      ).find((pill) =>
        pill.textContent.includes(
          this.categories.find((cat) => cat.id === categoryId)?.name
        )
      );
      if (targetPill) {
        targetPill.classList.remove(
          "bg-white",
          "border-2",
          "border-gold",
          "text-warm-brown"
        );
        targetPill.classList.add("bg-gold", "text-white", "active");
      }
    }

    // Update dropdown
    const categoryFilter = document.getElementById("category-filter");
    if (categoryFilter) {
      categoryFilter.value = categoryId;
    }
  }

  addToCart(item) {
    console.log("addToCart called with:", item);

    const price = parseFloat(item.price);
    if (price <= 0) {
      this.showError("This item is currently unavailable");
      return;
    }

    const existingItem = this.cart.find((cartItem) => cartItem.id == item.id);
    const minQuantity = parseInt(item.min_quantity) || 1;

    if (existingItem) {
      existingItem.quantity += minQuantity;
      console.log("Updated existing item quantity:", existingItem);
    } else {
      const newCartItem = {
        id: parseInt(item.id),
        name: item.name,
        price: price,
        quantity: minQuantity,
        min_quantity: minQuantity,
      };
      this.cart.push(newCartItem);
      console.log("Added new item to cart:", newCartItem);
    }

    console.log("Current cart:", this.cart);
    this.renderCart();
    this.showSuccessMessage(`Added ${item.name} to cart`);
  }

  removeFromCart(itemId) {
    console.log("Removing item from cart:", itemId);
    const initialLength = this.cart.length;
    this.cart = this.cart.filter((item) => item.id !== itemId);
    console.log("Cart after removal:", this.cart);

    if (this.cart.length < initialLength) {
      this.renderCart();
      this.showSuccessMessage("Item removed from cart");
    }
  }

  updateCartItemQuantity(itemId, newQuantity) {
    console.log("Updating quantity for item:", itemId, "to:", newQuantity);
    const item = this.cart.find((cartItem) => cartItem.id === itemId);
    if (item) {
      if (newQuantity >= item.min_quantity) {
        item.quantity = newQuantity;
        this.renderCart();
        console.log("Updated item quantity:", item);
      } else {
        this.showError(
          `Minimum quantity for this item is ${item.min_quantity}`
        );
      }
    }
  }

  renderCart() {
    console.log("Rendering cart with items:", this.cart);

    const orderItems = document.getElementById("order-items");
    const emptyCart = document.getElementById("empty-cart");
    const orderTotals = document.getElementById("order-totals");
    const paymentSection = document.getElementById("payment-section");

    if (!orderItems) return;

    if (this.cart.length === 0) {
      if (emptyCart) emptyCart.style.display = "block";
      if (orderTotals) orderTotals.classList.add("hidden");
      if (paymentSection) paymentSection.classList.add("hidden");
      orderItems.innerHTML =
        '<div id="empty-cart" class="text-center py-8 text-gray-500"><i class="fas fa-shopping-cart text-3xl mb-2"></i><p>No items in cart</p></div>';
      return;
    }

    if (emptyCart) emptyCart.style.display = "none";
    if (orderTotals) orderTotals.classList.remove("hidden");
    if (paymentSection) paymentSection.classList.remove("hidden");

    orderItems.innerHTML = "";

    this.cart.forEach((item) => {
      const cartItem = document.createElement("div");
      cartItem.className = "cart-item bg-gray-50 p-3 rounded mb-2";
      cartItem.innerHTML = `
                <div class="flex justify-between items-start mb-2">
                    <span class="font-medium text-sm flex-1 pr-2">${
                      item.name
                    }</span>
                    <button class="remove-item-btn text-red-500 text-xs hover:text-red-700" data-id="${
                      item.id
                    }">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <button class="qty-btn bg-gray-300 hover:bg-gray-400 text-xs px-2 py-1 rounded" data-id="${
                          item.id
                        }" data-action="decrease">-</button>
                        <span class="quantity text-sm font-medium min-w-[20px] text-center">${
                          item.quantity
                        }</span>
                        <button class="qty-btn bg-gray-300 hover:bg-gray-400 text-xs px-2 py-1 rounded" data-id="${
                          item.id
                        }" data-action="increase">+</button>
                    </div>
                    <span class="text-sm font-semibold">৳${(
                      item.price * item.quantity
                    ).toFixed(2)}</span>
                </div>
            `;

      orderItems.appendChild(cartItem);
    });

    this.calculateTotals();
  }

  calculateTotals() {
    if (this.cart.length === 0) return;

    const subtotal = this.cart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    const vatAmount = subtotal * this.vatRate;
    const total = subtotal + vatAmount;

    const subtotalEl = document.getElementById("subtotal");
    const vatAmountEl = document.getElementById("vat-amount");
    const totalAmountEl = document.getElementById("total-amount");
    const amountPaidInput = document.getElementById("amount-paid");

    if (subtotalEl) subtotalEl.textContent = `৳${subtotal.toFixed(2)}`;
    if (vatAmountEl) vatAmountEl.textContent = `৳${vatAmount.toFixed(2)}`;
    if (totalAmountEl) totalAmountEl.textContent = `৳${total.toFixed(2)}`;
    if (amountPaidInput)
      amountPaidInput.placeholder = `Total: ৳${total.toFixed(2)}`;

    this.calculateChange();
  }

  selectPaymentMethod(method) {
    console.log("Payment method selected:", method);
    this.currentPaymentMethod = method;

    document.querySelectorAll(".payment-method-btn").forEach((btn) => {
      btn.classList.remove("bg-bakery-green", "text-white");
      btn.classList.add("bg-gray-300", "text-gray-700");
    });

    const selectedBtn = document.querySelector(`[data-method="${method}"]`);
    if (selectedBtn) {
      selectedBtn.classList.remove("bg-gray-300", "text-gray-700");
      selectedBtn.classList.add("bg-bakery-green", "text-white");
    }
  }

  calculateChange() {
    const subtotal = this.cart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    const total = subtotal * (1 + this.vatRate);
    const amountPaidInput = document.getElementById("amount-paid");
    const changeDiv = document.getElementById("change-amount");

    if (!amountPaidInput || !changeDiv) return;

    const amountPaid = parseFloat(amountPaidInput.value) || 0;
    const change = amountPaid - total;

    if (amountPaid > 0) {
      changeDiv.classList.remove("hidden");
      const changeSpan = changeDiv.querySelector("span");

      if (change >= 0) {
        changeDiv.className = changeDiv.className.replace(
          "text-red-500",
          "text-bakery-green"
        );
        changeSpan.textContent = `৳${change.toFixed(2)}`;
        changeDiv.querySelector(".font-semibold").parentNode.innerHTML =
          'Change: <span class="font-semibold text-bakery-green">৳' +
          change.toFixed(2) +
          "</span>";
      } else {
        changeDiv.className = changeDiv.className.replace(
          "text-bakery-green",
          "text-red-500"
        );
        changeDiv.querySelector(".font-semibold").parentNode.innerHTML =
          'Shortage: <span class="font-semibold text-red-500">৳' +
          Math.abs(change).toFixed(2) +
          "</span>";
      }
    } else {
      changeDiv.classList.add("hidden");
    }
  }

  async processOrder() {
    console.log("Processing order...");

    if (this.cart.length === 0) {
      this.showError("Cart is empty");
      return;
    }

    if (this.isProcessing) {
      console.log("Order already being processed");
      return;
    }

    const subtotal = this.cart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    const total = subtotal * (1 + this.vatRate);
    const amountPaidInput = document.getElementById("amount-paid");
    const amountPaid = parseFloat(amountPaidInput?.value) || 0;

    if (amountPaid < total) {
      this.showError("Insufficient payment amount");
      return;
    }

    this.isProcessing = true;

    const orderData = {
      items: this.cart,
      customer: {
        name: document.getElementById("customer-name")?.value || "",
        phone: document.getElementById("customer-phone")?.value || "",
      },
      payment: {
        method: this.currentPaymentMethod,
        amount_paid: amountPaid,
      },
      notes: "",
    };

    console.log("Order data:", orderData);

    try {
      const processBtn = document.getElementById("process-order-btn");
      if (processBtn) {
        processBtn.disabled = true;
        processBtn.innerHTML =
          '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
      }

      // Try to submit to API, if it fails, process locally
      let result;
      try {
        const response = await fetch("api/orders.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(orderData),
        });

        if (!response.ok) {
          throw new Error("API not available");
        }

        result = await response.json();
      } catch (apiError) {
        console.warn("API not available, processing locally");
        // Generate local order
        result = {
          success: true,
          order_number: "DD" + Date.now(),
          change_amount: (amountPaid - total).toFixed(2),
          order_details: [
            {
              amount_paid: amountPaid,
              total_amount: total,
            },
          ],
        };
      }

      if (result.success) {
        this.showReceipt(result);
        this.clearOrder();
        this.showSuccessMessage("Order processed successfully!");
      } else {
        this.showError(result.message || "Failed to process order");
      }
    } catch (error) {
      console.error("Error processing order:", error);
      this.showError("Error processing order: " + error.message);
    } finally {
      this.isProcessing = false;
      const processBtn = document.getElementById("process-order-btn");
      if (processBtn) {
        processBtn.disabled = false;
        processBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Process Order';
      }
    }
  }

  showReceipt(orderData) {
    const modal = document.getElementById("receipt-modal");
    const orderNumber = document.getElementById("receipt-order-number");
    const receiptContent = document.getElementById("receipt-content");

    if (!modal || !orderNumber || !receiptContent) return;

    orderNumber.textContent = orderData.order_number;

    let receiptHTML = `
            <div class="text-center mb-4">
                <h2 class="font-bold text-lg">Dacca Delights</h2>
                <p class="text-sm text-gray-600">Dhaka, Bangladesh</p>
                <p class="text-sm">Date: ${new Date().toLocaleString()}</p>
            </div>
            <div class="space-y-2">
        `;

    this.cart.forEach((item) => {
      receiptHTML += `
                <div class="flex justify-between text-sm">
                    <span>${item.name} x${item.quantity}</span>
                    <span>৳${(item.price * item.quantity).toFixed(2)}</span>
                </div>
            `;
    });

    const subtotal = this.cart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    const vatAmount = subtotal * this.vatRate;
    const total = subtotal + vatAmount;
    const amountPaid =
      parseFloat(orderData.order_details?.[0]?.amount_paid) || total;
    const change = amountPaid - total;

    receiptHTML += `
            </div>
            <div class="border-t pt-2 mt-2 space-y-1">
                <div class="flex justify-between text-sm">
                    <span>Subtotal:</span>
                    <span>৳${subtotal.toFixed(2)}</span>
                </div>
                <div class="flex justify-between font-bold">
                    <span>Total:</span>
                    <span>৳${total.toFixed(2)}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>Paid:</span>
                    <span>৳${amountPaid.toFixed(2)}</span>
                </div>
                <div class="flex justify-between text-sm text-green-600">
                    <span>Change:</span>
                    <span>৳${change.toFixed(2)}</span>
                </div>
            </div>
            <div class="text-center mt-4 text-xs text-gray-500">
                <p>Thank you for visiting Dacca Delights!</p>
            </div>
        `;

    receiptContent.innerHTML = receiptHTML;
    modal.classList.remove("hidden");
  }

  closeReceiptModal() {
    const modal = document.getElementById("receipt-modal");
    if (modal) {
      modal.classList.add("hidden");
    }
  }

  printReceipt() {
    window.print();
  }

  clearOrder() {
    console.log("Clearing order...");
    this.cart = [];

    const customerName = document.getElementById("customer-name");
    const customerPhone = document.getElementById("customer-phone");
    const amountPaid = document.getElementById("amount-paid");

    if (customerName) customerName.value = "";
    if (customerPhone) customerPhone.value = "";
    if (amountPaid) amountPaid.value = "";

    this.renderCart();
    this.showSuccessMessage("Order cleared");
  }

  showError(message) {
    console.error("POS Error:", message);
    alert("Error: " + message);
  }

  showSuccessMessage(message) {
    console.log("Success:", message);

    // Remove existing success messages
    const existingMessages = document.querySelectorAll(".success-message");
    existingMessages.forEach((msg) => msg.remove());

    const successDiv = document.createElement("div");
    successDiv.className =
      "success-message fixed top-4 right-4 bg-bakery-green text-white px-4 py-2 rounded shadow-md z-50 fade-in";
    successDiv.textContent = message;
    document.body.appendChild(successDiv);

    setTimeout(() => {
      if (successDiv.parentNode) {
        successDiv.remove();
      }
    }, 3000);
  }

  showReportsModal() {
    const modal = document.getElementById("reports-modal");
    if (modal) {
      modal.classList.remove("hidden");
      this.loadReport();
    }
  }

  closeReportsModal() {
    const modal = document.getElementById("reports-modal");
    if (modal) {
      modal.classList.add("hidden");
    }
  }

  async loadReport() {
    const reportType = document.getElementById("report-type-filter").value;
    const reportDate = document.getElementById("report-date-filter").value;

    try {
      const response = await fetch(
        `api/reports.php?type=${reportType}&date=${reportDate}`
      );
      const data = await response.json();

      if (data.success) {
        this.renderReport(data);
        this.renderSalesChart(data);
      } else {
        this.showError(data.message || "Failed to load report");
      }
    } catch (error) {
      console.error("Error loading report:", error);
      this.showError("Error loading report: " + error.message);
    }
  }

  renderReport(data) {
    const reportsContent = document.getElementById("reports-content");
    if (!reportsContent) return;

    let content = "";

    if (data.report_type === "daily") {
      content = `
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Orders</p>
            <p class="text-2xl font-bold">${data.summary.total_orders}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Revenue</p>
            <p class="text-2xl font-bold">৳${data.summary.total_revenue}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Cash Sales</p>
            <p class="text-2xl font-bold">৳${data.summary.cash_sales}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Card Sales</p>
            <p class="text-2xl font-bold">৳${data.summary.card_sales}</p>
          </div>
        </div>
      `;
    } else if (data.report_type === "weekly") {
      content = `
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Orders</p>
            <p class="text-2xl font-bold">${data.weekly_totals.total_orders}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Revenue</p>
            <p class="text-2xl font-bold">৳${data.weekly_totals.total_revenue}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Cash Sales</p>
            <p class="text-2xl font-bold">৳${data.weekly_totals.cash_sales}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Card Sales</p>
            <p class="text-2xl font-bold">৳${data.weekly_totals.card_sales}</p>
          </div>
        </div>
      `;
    } else if (data.report_type === "monthly") {
        content = `
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Orders</p>
            <p class="text-2xl font-bold">${data.monthly_totals.total_orders}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Revenue</p>
            <p class="text-2xl font-bold">৳${data.monthly_totals.total_revenue}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Cash Sales</p>
            <p class="text-2xl font-bold">৳${data.monthly_totals.cash_sales}</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Card Sales</p>
            <p class="text-2xl font-bold">৳${data.monthly_totals.card_sales}</p>
          </div>
        </div>
      `;
    }

    reportsContent.innerHTML = content;
  }

  renderSalesChart(data) {
    const ctx = document.getElementById("sales-chart").getContext("2d");

    if (this.salesChart) {
      this.salesChart.destroy();
    }

    let labels = [];
    let chartData = [];

    if (data.report_type === "daily") {
      labels = data.top_selling_items.map((item) => item.item_name);
      chartData = data.top_selling_items.map((item) => item.total_quantity);
    } else if (data.report_type === "weekly") {
      labels = data.daily_breakdown.map((day) => day.sale_date);
      chartData = data.daily_breakdown.map((day) => day.total_revenue);
    } else if (data.report_type === "monthly") {
        labels = data.daily_breakdown.map((day) => day.sale_date);
        chartData = data.daily_breakdown.map((day) => day.total_revenue);
    }

    this.salesChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Sales",
            data: chartData,
            backgroundColor: "rgba(250, 129, 47, 0.5)",
            borderColor: "rgba(250, 129, 47, 1)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
}

// Initialize POS System when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM loaded, initializing POS system...");
  try {
    window.posSystem = new POSSystem();
    console.log("POS system initialized successfully");
  } catch (error) {
    console.error("Failed to initialize POS system:", error);
    alert("Failed to initialize POS system. Check console for errors.");
  }
});

// Add some global error handling
window.addEventListener("error", (e) => {
  console.error("Global error:", e.error);
});
