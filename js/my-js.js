document.addEventListener('DOMContentLoaded', function () {
    const sideNav = document.querySelectorAll('.sidenav')
    M.Sidenav.init(sideNav)

    const collaps = document.querySelectorAll('.collapsible')
    M.Collapsible.init(collaps)


    var fixButton = document.querySelectorAll('.fixed-action-btn');
    M.FloatingActionButton.init(fixButton, {
        direction: 'bottom',
        hoverEnabled: false
    })

    const slider = document.querySelectorAll('.slider')
    M.Slider.init(slider, {
        indicators: false,
        interval: 8000,
        duration: 1000,
        height: 460
    })

    const scrollspy = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(scrollspy, {
        scrollOffset: 50
    });

    var select = document.querySelectorAll('select');
    var instances = M.FormSelect.init(select);


    var tp1 = document.querySelectorAll('.tp1')
    var tp = document.getElementById('tp');

    tp1.forEach((e) => {
        e.addEventListener('change', () => {
            if (e.checked) {
                // do this
                tp.style.display = 'inline';
            } else {
                // do that
                tp.style.display = 'none';
            }

        })
    });


});