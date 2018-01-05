function StandaloneLoadWindow(window_class) {
    var self_window = $('body > .con_standalone');

    if(typeof window[window_class] === 'function') {
        /* Update variable to point to class */
        window_class = window[window_class];

        new window_class(self_window);
    }
}

