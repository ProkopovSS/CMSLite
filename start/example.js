 
"use strict";

b4w.register("example_main", function(exports, require) {

var m_anim   = require("animation");
var m_app    = require("app");
var m_data   = require("data");
var m_main   = require("main");
var m_scs    = require("scenes");
var m_sfx    = require("sfx");

exports.init = function() {
    m_app.init({
        canvas_container_id: "canvas_cont",
        callback: init_cb,
        physics_enabled: false,
        alpha: true,
        report_init_failure: false,
        media_auto_activation: false
    });
}

function init_cb(canvas_elem, success) {
    if (!success) {
        console.log("b4w init failure");
        return;
    }

    if (window.web_page_integration_dry_run)
        m_data.load("start/scull.json", load_cb);
    else
        m_data.load("start/scull.json", load_cb);

    resize();

    window.addEventListener("resize", resize);
}

function resize() {
    m_app.resize_to_container();
}

function load_cb(root) {
    var scull = m_scs.get_object_by_name('Mandible');
    m_anim.stop(scull);
    //run_button.addEventListener("mousedown", demo_link_click, false);
    demo_link_click();
}
function demo_link_click() {
    m_data.activate_media();

    var scull = m_scs.get_object_by_name('Mandible');
  
    m_anim.apply(scull, "Speak.001");
    var spk = m_scs.get_object_by_name("Speaker");

    setTimeout(function ()
                            { m_anim.play(scull);
                              m_sfx.play_def(spk);},1000);
    
}




});

b4w.require("example_main").init();