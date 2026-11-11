/**
 * FurnishMe Atelier — Main Frontend Scripts
 * Luxury Japanese/Scandinavian Minimalist UI Interactions
 */

// Prevent mouse wheel from inadvertently changing number inputs
document.addEventListener(
  "wheel",
  function (e) {
    if (e.target.type === "number" && document.activeElement === e.target) {
      e.preventDefault();
    }
  },
  { passive: false }
);

// Toast Notification System
function showToast(message, type = "info") {
  let container = document.getElementById("toast-container");
  if (!container) {
    container = document.createElement("div");
    container.id = "toast-container";
    container.className = "fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none";
    document.body.appendChild(container);
  }

  const toast = document.createElement("div");
  toast.className =
    "pointer-events-auto flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg border text-sm font-medium transition-all duration-300 transform translate-y-4 opacity-0";

  let iconClass = "ri-information-line";
  let styleClasses = "bg-white text-stone-900 border-stone-200 shadow-stone-200/50";

  if (type === "success") {
    iconClass = "ri-checkbox-circle-line text-emerald-600";
    styleClasses = "bg-white text-stone-900 border-emerald-200";
  } else if (type === "error") {
    iconClass = "ri-error-warning-line text-rose-600";
    styleClasses = "bg-white text-stone-900 border-rose-200";
  } else if (type === "warning") {
    iconClass = "ri-alert-line text-amber-600";
    styleClasses = "bg-white text-stone-900 border-amber-200";
  } else {
    iconClass = "ri-information-line text-stone-700";
  }

  toast.className += " " + styleClasses;
  toast.innerHTML = `
    <i class="${iconClass} text-lg flex-shrink-0"></i>
    <span class="flex-1">${message}</span>
    <button type="button" aria-label="Close" class="text-stone-400 hover:text-stone-700 transition-colors ml-2" onclick="this.parentElement.remove()">
      <i class="ri-close-line text-base"></i>
    </button>
  `;

  container.appendChild(toast);

  // Animate in
  requestAnimationFrame(() => {
    toast.classList.remove("translate-y-4", "opacity-0");
    toast.classList.add("translate-y-0", "opacity-100");
  });

  // Auto-dismiss after 4 seconds
  setTimeout(() => {
    toast.classList.remove("translate-y-0", "opacity-100");
    toast.classList.add("translate-y-4", "opacity-0");
    setTimeout(() => {
      if (toast.parentElement) toast.remove();
    }, 300);
  }, 4000);
}

// Global UI Event Listeners
document.addEventListener("DOMContentLoaded", () => {
  // --- Mobile Drawer Menu ---
  const menuBtn = document.getElementById("menu-btn");
  const closerBtn = document.getElementById("closer");
  const mobileDrawer = document.getElementById("mobile-drawer");
  const mobileBackdrop = document.getElementById("mobile-backdrop");

  function openDrawer() {
    if (mobileDrawer && mobileBackdrop) {
      mobileBackdrop.classList.remove("hidden");
      requestAnimationFrame(() => {
        mobileBackdrop.classList.remove("opacity-0");
        mobileBackdrop.classList.add("opacity-100");
        mobileDrawer.classList.remove("translate-x-full");
        mobileDrawer.classList.add("translate-x-0");
      });
      document.body.classList.add("overflow-hidden");
    }
  }

  function closeDrawer() {
    if (mobileDrawer && mobileBackdrop) {
      mobileDrawer.classList.remove("translate-x-0");
      mobileDrawer.classList.add("translate-x-full");
      mobileBackdrop.classList.remove("opacity-100");
      mobileBackdrop.classList.add("opacity-0");
      setTimeout(() => {
        mobileBackdrop.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
      }, 300);
    }
  }

  if (menuBtn) menuBtn.addEventListener("click", openDrawer);
  if (closerBtn) closerBtn.addEventListener("click", closeDrawer);
  if (mobileBackdrop) mobileBackdrop.addEventListener("click", closeDrawer);

  // --- Search Dialog Modal ---
  const searchBtn = document.getElementById("search-btn");
  const searchModal = document.getElementById("search-modal");
  const searchModalBackdrop = document.getElementById("search-modal-backdrop");
  const searchCloseBtn = document.getElementById("search-close-btn");
  const searchInput = document.getElementById("search-box");

  function openSearchModal() {
    if (searchModal) {
      searchModal.classList.remove("hidden");
      requestAnimationFrame(() => {
        searchModal.classList.remove("opacity-0");
        searchModal.classList.add("opacity-100");
        if (searchInput) searchInput.focus();
      });
      document.body.classList.add("overflow-hidden");
    }
  }

  function closeSearchModal() {
    if (searchModal) {
      searchModal.classList.remove("opacity-100");
      searchModal.classList.add("opacity-0");
      setTimeout(() => {
        searchModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
      }, 200);
    }
  }

  if (searchBtn) searchBtn.addEventListener("click", openSearchModal);
  if (searchCloseBtn) searchCloseBtn.addEventListener("click", closeSearchModal);
  if (searchModalBackdrop) searchModalBackdrop.addEventListener("click", closeSearchModal);

  // Close modals on Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeDrawer();
      closeSearchModal();
    }
  });

  // --- Quantity Steppers (+ / -) ---
  document.querySelectorAll("[data-stepper]").forEach((stepper) => {
    const decBtn = stepper.querySelector("[data-stepper-decrease]");
    const incBtn = stepper.querySelector("[data-stepper-increase]");
    const input = stepper.querySelector("input[type='number']");

    if (decBtn && incBtn && input) {
      decBtn.addEventListener("click", () => {
        const min = parseInt(input.min) || 1;
        const current = parseInt(input.value) || 1;
        if (current > min) {
          input.value = current - 1;
          input.dispatchEvent(new Event("change"));
        }
      });

      incBtn.addEventListener("click", () => {
        const max = parseInt(input.max) || 999;
        const current = parseInt(input.value) || 1;
        if (current < max) {
          input.value = current + 1;
          input.dispatchEvent(new Event("change"));
        }
      });
    }
  });

  // --- Password Reveal Toggle ---
  document.querySelectorAll("[data-toggle-password]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetId = btn.getAttribute("data-toggle-password");
      const input = document.getElementById(targetId);
      const icon = btn.querySelector("i");
      if (input) {
        if (input.type === "password") {
          input.type = "text";
          if (icon) {
            icon.classList.remove("ri-eye-line");
            icon.classList.add("ri-eye-off-line");
          }
        } else {
          input.type = "password";
          if (icon) {
            icon.classList.remove("ri-eye-off-line");
            icon.classList.add("ri-eye-line");
          }
        }
      }
    });
  });

  // --- Product Gallery Thumbnail Switcher ---
  const mainProductImg = document.getElementById("main-product-img");
  const thumbBtns = document.querySelectorAll(".thumb-btn");
  if (mainProductImg && thumbBtns.length > 0) {
    thumbBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        const src = btn.getAttribute("data-src");
        if (src) {
          mainProductImg.src = src;
          thumbBtns.forEach((b) => {
            b.classList.remove("border-2", "border-stone-900");
            b.classList.add("border", "border-stone-200");
          });
          btn.classList.remove("border", "border-stone-200");
          btn.classList.add("border-2", "border-stone-900");
        }
      });
    });
  }

  // --- Form submission mock feedback ---
  document.querySelectorAll("form[data-toast-success]").forEach((form) => {
    form.addEventListener("submit", (e) => {
      const msg = form.getAttribute("data-toast-success");
      // If form doesn't have an action or has action="#"
      if (!form.action || form.getAttribute("action") === "#" || form.getAttribute("action") === "") {
        e.preventDefault();
        showToast(msg || "Action completed successfully", "success");
        form.reset();
      }
    });
  });
});

// --- Hero Slider Logic ---
let currentSlide = 0;
function showSlide(slideIndex) {
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dot");
  if (!slides || slides.length === 0) return;

  if (slideIndex >= slides.length) currentSlide = 0;
  else if (slideIndex < 0) currentSlide = slides.length - 1;
  else currentSlide = slideIndex;

  slides.forEach((slide, idx) => {
    if (idx === currentSlide) {
      slide.classList.remove("opacity-0", "pointer-events-none", "z-0");
      slide.classList.add("opacity-100", "z-10");
    } else {
      slide.classList.remove("opacity-100", "z-10");
      slide.classList.add("opacity-0", "pointer-events-none", "z-0");
    }
  });

  dots.forEach((dot, idx) => {
    if (idx === currentSlide) {
      dot.classList.add("bg-stone-900", "w-8");
      dot.classList.remove("bg-stone-300", "w-2.5");
    } else {
      dot.classList.remove("bg-stone-900", "w-8");
      dot.classList.add("bg-stone-300", "w-2.5");
    }
  });
}

function next() {
  showSlide(currentSlide + 1);
}

function prev() {
  showSlide(currentSlide - 1);
}

// Auto slider if on home page
if (document.querySelector(".hero-slide")) {
  setInterval(() => {
    // Only auto-advance if document is visible
    if (!document.hidden) {
      next();
    }
  }, 6500);
}
