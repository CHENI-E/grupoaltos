(function () {
  "use strict";
  if (localStorage.getItem("zenodarktheme")) {
    document.querySelector("html").setAttribute("data-theme-mode", "dark");
    document.querySelector("html").setAttribute("data-menu-styles", "dark");
    document.querySelector("html").setAttribute("data-header-styles", "transparent");
  }
  if (localStorage.zenortl) {
    let html = document.querySelector("html");
    html.setAttribute("dir", "rtl");
    document
      .querySelector("#style")
      ?.setAttribute(
        "href",
        "../assets/libs/bootstrap/css/bootstrap.rtl.min.css"
      );
  }
  if (localStorage.zenolayout) {
    let html = document.querySelector("html");
    html.setAttribute("data-nav-layout", "horizontal");
    document.querySelector("html").setAttribute("data-menu-styles", "light");
  }
  if (localStorage.getItem("zenolayout") == "horizontal") {
    document
      .querySelector("html")
      .setAttribute("data-nav-layout", "horizontal");
  }
  if (localStorage.loaderEnable == "true") {
    document.querySelector("html").setAttribute("loader", "enable");
  } else {
    if (!document.querySelector("html").getAttribute("loader")) {
      document.querySelector("html").setAttribute("loader", "disable");
    }
  }

  function localStorageBackup() {
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.primaryRGB) {
      if (document.querySelector(".theme-container-primary")) {
        document.querySelector(".theme-container-primary").value =
          localStorage.primaryRGB;
      }
      document
        .querySelector("html")
        .style.setProperty("--primary-rgb", localStorage.primaryRGB);
    }
    if (localStorage.bodyBgRGB && localStorage.bodylightRGB) {
      if (document.querySelector(".theme-container-background")) {
        document.querySelector(".theme-container-background").value =
          localStorage.bodyBgRGB;
      }
      document
        .querySelector("html")
        .style.setProperty("--body-bg-rgb", localStorage.bodyBgRGB);
      document
        .querySelector("html")
        .style.setProperty("--body-bg-rgb2", localStorage.bodylightRGB);
      document
        .querySelector("html")
        .style.setProperty("--light-rgb", localStorage.bodylightRGB);
      document
        .querySelector("html")
        .style.setProperty(
          "--form-control-bg",
          `rgb(${localStorage.bodylightRGB})`
        );
        document
          .querySelector("html")
          .style.setProperty("--gray-3", `rgb(${localStorage.bodylightRGB})`);
      document
        .querySelector("html")
        .style.setProperty("--input-border", "rgba(255,255,255,0.1)");
      let html = document.querySelector("html");
      html.setAttribute("data-theme-mode", "dark");
      html.setAttribute("data-menu-styles", "dark");
      html.setAttribute("data-header-styles", "dark");
    }
    if (localStorage.zenodarktheme) {
      let html = document.querySelector("html");
      html.setAttribute("data-theme-mode", "dark");
    }
    if (localStorage.zenolayout) {
      let html = document.querySelector("html");
      let layoutValue = localStorage.getItem("zenolayout");
      html.setAttribute("data-nav-layout", "horizontal");
      setTimeout(() => {
        clearNavDropdown();
      }, 1000);
      html.setAttribute("data-nav-style", "menu-click");
      setTimeout(() => {
        checkHoriMenu();
      }, 5000);
    }
    if (localStorage.zenoverticalstyles) {
      let html = document.querySelector("html");
      let verticalStyles = localStorage.getItem("zenoverticalstyles");

      if (verticalStyles == "default") {
        html.setAttribute("data-vertical-style", "default");
        localStorage.removeItem("zenonavstyles");
      }
      if (verticalStyles == "closed") {
        html.setAttribute("data-vertical-style", "closed");
        localStorage.removeItem("zenonavstyles");
      }
      if (verticalStyles == "icontext") {
        html.setAttribute("data-vertical-style", "icontext");
        localStorage.removeItem("zenonavstyles");
      }
      if (verticalStyles == "overlay") {
        html.setAttribute("data-vertical-style", "overlay");
        localStorage.removeItem("zenonavstyles");
      }
      if (verticalStyles == "detached") {
        html.setAttribute("data-vertical-style", "detached");
        localStorage.removeItem("zenonavstyles");
      }
      if (verticalStyles == "doublemenu") {
        html.setAttribute("data-vertical-style", "doublemenu");
        localStorage.removeItem("zenonavstyles");
        setTimeout(() => {
          const menuSlideItem = document.querySelectorAll(
            ".main-menu > li > .side-menu__item"
          );

          // Create the tooltip element
          const tooltip = document.createElement("div");
          tooltip.className = "custome-tooltip";
          // Set the CSS properties of the tooltip element
          tooltip.style.setProperty("position", "fixed");
          tooltip.style.setProperty("display", "none");
          tooltip.style.setProperty("padding", "0.5rem");
          tooltip.style.setProperty("font-weight", "500");
          tooltip.style.setProperty("font-size", "0.75rem");
          tooltip.style.setProperty("background-color", "rgb(15, 23 ,42)");
          tooltip.style.setProperty("color", "rgb(255, 255 ,255)");
          tooltip.style.setProperty("margin-inline-start", "48px");
          tooltip.style.setProperty("border-radius", "0.25rem");
          tooltip.style.setProperty("z-index", "99");

          menuSlideItem.forEach((e) => {
            // Add an event listener to the menu slide item to show the tooltip
            e.addEventListener("mouseenter", () => {
              if (localStorage.zenoverticalstyles == "doublemenu") {
                tooltip.style.setProperty("display", "block");
                tooltip.textContent =
                  e.querySelector(".side-menu__label").textContent;
                if (
                  document
                    .querySelector("html")
                    .getAttribute("data-vertical-style") == "doublemenu"
                ) {
                  e.appendChild(tooltip);
                }
              }
            });

            // Add an event listener to hide the tooltip
            e.addEventListener("mouseleave", () => {
              tooltip.style.setProperty("display", "none");
              tooltip.textContent =
                e.querySelector(".side-menu__label").textContent;
            });
          });
        }, 1000);
      }
    }
    if (localStorage.zenonavstyles) {
      let html = document.querySelector("html");
      let navStyles = localStorage.getItem("zenonavstyles");
      if (navStyles == "menu-click") {
        html.setAttribute("data-nav-style", "menu-click");
        localStorage.removeItem("zenoverticalstyles");
        html.removeAttribute("data-vertical-style");
      }
      if (navStyles == "menu-hover") {
        html.setAttribute("data-nav-style", "menu-hover");
        localStorage.removeItem("zenoverticalstyles");
        html.removeAttribute("data-vertical-style");
      }
      if (navStyles == "icon-click") {
        html.setAttribute("data-nav-style", "icon-click");
        localStorage.removeItem("zenoverticalstyles");
        html.removeAttribute("data-vertical-style");
      }
      if (navStyles == "icon-hover") {
        html.setAttribute("data-nav-style", "icon-hover");
        localStorage.removeItem("zenoverticalstyles");
        html.removeAttribute("data-vertical-style");
      }
    }
    if (localStorage.zenoclassic) {
      let html = document.querySelector("html");
      html.setAttribute("data-page-style", "classic");
    }
    if (localStorage.zenomodern) {
      let html = document.querySelector("html");
      html.setAttribute("data-page-style", "modern");
    }
    if (localStorage.zenoboxed) {
      let html = document.querySelector("html");
      html.setAttribute("data-width", "boxed");
    }
    if (localStorage.zenofullwidth) {
      let html = document.querySelector("html");
      html.setAttribute("data-width", "fullwidth");
    }
    if (localStorage.zenoheaderfixed) {
      let html = document.querySelector("html");
      html.setAttribute("data-header-position", "fixed");
    }
    if (localStorage.zenoheaderscrollable) {
      let html = document.querySelector("html");
      html.setAttribute("data-header-position", "scrollable");
    }
    if (localStorage.zenomenufixed) {
      let html = document.querySelector("html");
      html.setAttribute("data-menu-position", "fixed");
    }
    if (localStorage.zenomenuscrollable) {
      let html = document.querySelector("html");
      html.setAttribute("data-menu-position", "scrollable");
    }
    if (localStorage.zenoMenu) {
      let html = document.querySelector("html");
      let menuValue = localStorage.getItem("zenoMenu");
      switch (menuValue) {
        case "light":
          html.setAttribute("data-menu-styles", "light");
          break;
        case "dark":
          html.setAttribute("data-menu-styles", "dark");
          break;
        case "color":
          html.setAttribute("data-menu-styles", "color");
          break;
        case "gradient":
          html.setAttribute("data-menu-styles", "gradient");
          break;
        case "transparent":
          html.setAttribute("data-menu-styles", "transparent");
          break;
        default:
          break;
      }
    }
    if (localStorage.zenoHeader) {
      let html = document.querySelector("html");
      let headerValue = localStorage.getItem("zenoHeader");
      switch (headerValue) {
        case "light":
          html.setAttribute("data-header-styles", "light");
          break;
        case "dark":
          html.setAttribute("data-header-styles", "dark");
          break;
        case "color":
          html.setAttribute("data-header-styles", "color");
          break;
        case "gradient":
          html.setAttribute("data-header-styles", "gradient");
          break;
        case "transparent":
          html.setAttribute("data-header-styles", "transparent");
          break;

        default:
          break;
      }
    }
    if (localStorage.bgimg) {
      let html = document.querySelector("html");
      let value = localStorage.getItem("bgimg");
      html.setAttribute("data-bg-img", value);
    }
  }
  localStorageBackup();
})();
