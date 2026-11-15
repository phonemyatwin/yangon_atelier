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

document.addEventListener("DOMContentLoaded", () => {
  const sidebarToggle = document.getElementById("sidebar-toggle");
  const sidebar = document.getElementById("admin__sidebar");
  const overlay = document.getElementById("admin__overlay");

  function openSidebar() {
    if (sidebar && overlay) {
      sidebar.classList.remove("-translate-x-full");
      sidebar.classList.add("translate-x-0");
      overlay.classList.remove("hidden");
      requestAnimationFrame(() => {
        overlay.classList.remove("opacity-0");
        overlay.classList.add("opacity-100");
      });
      document.body.classList.add("overflow-hidden");
    }
  }

  function closeSidebar() {
    if (sidebar && overlay) {
      sidebar.classList.remove("translate-x-0");
      sidebar.classList.add("-translate-x-full");
      overlay.classList.remove("opacity-100");
      overlay.classList.add("opacity-0");
      setTimeout(() => {
        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
      }, 200);
    }
  }

  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", () => {
      if (sidebar && sidebar.classList.contains("-translate-x-full")) {
        openSidebar();
      } else {
        closeSidebar();
      }
    });
  }

  if (overlay) {
    overlay.addEventListener("click", closeSidebar);
  }

  // Close on Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeSidebar();
    }
  });

  // Image input live preview handler
  document.querySelectorAll("input[type='file'][data-preview-target]").forEach((fileInput) => {
    fileInput.addEventListener("change", function () {
      const targetId = this.getAttribute("data-preview-target");
      const targetImg = document.getElementById(targetId);
      if (targetImg && this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          targetImg.src = e.target.result;
          targetImg.classList.remove("hidden");
        };
        reader.readAsDataURL(this.files[0]);
      }
    });
  });

  // Custom Atelier Dropdowns Handler
  const dropdownContainers = document.querySelectorAll(
    "#category-dropdown-container, .custom-dropdown-container, [data-dropdown]"
  );

  dropdownContainers.forEach((container) => {
    const button = container.querySelector(
      "#category-button, .dropdown-trigger, button[type='button']"
    );
    const menu = container.querySelector(
      "#category-menu, .dropdown-menu, [data-dropdown-menu]"
    );
    const arrow = container.querySelector(
      "#category-arrow, .dropdown-arrow, i[class*='ri-arrow-down']"
    );
    const input = container.querySelector(
      "#category-input, input[type='hidden']"
    );
    const selectedText = container.querySelector(
      "#category-selected-text, .dropdown-selected-text"
    );
    const options = container.querySelectorAll(
      ".category-option, .dropdown-option"
    );

    if (button && menu) {
      button.addEventListener("click", (e) => {
        e.stopPropagation();
        const isOpen = !menu.classList.contains("hidden");

        // Close other open dropdowns
        document
          .querySelectorAll("#category-menu, .dropdown-menu, [data-dropdown-menu]")
          .forEach((m) => {
            if (m !== menu) m.classList.add("hidden");
          });
        document
          .querySelectorAll("#category-arrow, .dropdown-arrow, i[class*='ri-arrow-down']")
          .forEach((a) => {
            if (a !== arrow) a.classList.remove("rotate-180");
          });

        if (isOpen) {
          menu.classList.add("hidden");
          if (arrow) arrow.classList.remove("rotate-180");
        } else {
          menu.classList.remove("hidden");
          if (arrow) arrow.classList.add("rotate-180");
        }
      });

      options.forEach((opt) => {
        opt.addEventListener("click", function (e) {
          e.stopPropagation();
          const value = this.getAttribute("data-value");
          const label =
            this.getAttribute("data-label") ||
            (this.querySelector("span") ? this.querySelector("span").textContent : this.textContent.trim());

          if (input) input.value = value;
          if (selectedText) selectedText.textContent = label;

          options.forEach((el) => {
            el.className =
              "category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between text-[#362F2A] hover:bg-[#DFD8CD]";
            const check = el.querySelector(".check-icon");
            if (check) check.classList.add("hidden");
          });

          this.className =
            "category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between bg-[#8A5A44] text-[#F6F3EE] font-medium";
          const activeCheck = this.querySelector(".check-icon");
          if (activeCheck) activeCheck.classList.remove("hidden");

          menu.classList.add("hidden");
          if (arrow) arrow.classList.remove("rotate-180");
        });
      });
    }
  });

  // Global click outside and escape listeners for custom dropdowns
  document.addEventListener("click", (e) => {
    dropdownContainers.forEach((container) => {
      if (!container.contains(e.target)) {
        const menu = container.querySelector(
          "#category-menu, .dropdown-menu, [data-dropdown-menu]"
        );
        const arrow = container.querySelector(
          "#category-arrow, .dropdown-arrow, i[class*='ri-arrow-down']"
        );
        if (menu) menu.classList.add("hidden");
        if (arrow) arrow.classList.remove("rotate-180");
      }
    });
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      dropdownContainers.forEach((container) => {
        const menu = container.querySelector(
          "#category-menu, .dropdown-menu, [data-dropdown-menu]"
        );
        const arrow = container.querySelector(
          "#category-arrow, .dropdown-arrow, i[class*='ri-arrow-down']"
        );
        if (menu) menu.classList.add("hidden");
        if (arrow) arrow.classList.remove("rotate-180");
      });
    }
  });
});
