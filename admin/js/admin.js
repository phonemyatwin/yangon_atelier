/**
 * Yangon Atelier Admin Panel — Vanilla JavaScript
 * Clean mobile sidebar toggle, overlay backdrop, and dropzone image previews
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
});
