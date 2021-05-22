/**! WPPack 0.1.0 | https://github.com/sivankanat/wppack | MIT */

'use strict';

var AppPanel = {
  panelEl: document.getElementById("app_panel"),

  /* init */
  init: function init() {
    console.log("app panel");
    this.tabs();
  },

  /* tabs */
  tabs: function tabs() {
    this.panelEl.querySelectorAll("ul.tab-menu li").forEach(function (el) {
      el.addEventListener("click", function () {
        /* reset */
        this.closest("ul").querySelectorAll("li").forEach(function (el) {
          return el.classList.remove("current");
        });
        AppPanel.panelEl.querySelectorAll("ul.tab-contents li").forEach(function (el) {
          return el.classList.remove("current");
        });
        this.classList.add("current");
        var reqcontent = this.dataset.options;
        AppPanel.panelEl.querySelector("ul.tab-contents li[data-options=".concat(reqcontent, "]")).classList.add("current");
      });
    });
  }
};
AppPanel.init();
