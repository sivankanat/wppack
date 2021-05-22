const AppPanel = {
  panelEl: document.getElementById("app_panel"),

  /* init */
  init: function () {
    console.log("app panel");
    this.tabs();
  },

  /* tabs */
  tabs: function () {
    this.panelEl.querySelectorAll("ul.tab-menu li").forEach((el) => {
      el.addEventListener("click", function () {
        /* reset */
        this.closest("ul")
          .querySelectorAll("li")
          .forEach((el) => el.classList.remove("current"));

        AppPanel.panelEl
          .querySelectorAll("ul.tab-contents li")
          .forEach((el) => el.classList.remove("current"));

        this.classList.add("current");
        let reqcontent = this.dataset.options;
        AppPanel.panelEl
          .querySelector(`ul.tab-contents li[data-options=${reqcontent}]`)
          .classList.add("current");
      });
    });
  },
};

AppPanel.init();

