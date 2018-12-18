{
    function init() {
        alCargar();
        alCerrar();
    }

    let alCargar = function () {
        let position = window.name || 0;
        window.scrollTo(0, position);
        window.addEventListener("load", alCargar);
    }

    let alCerrar = function () {
        window.name = self.pageYOffset || (document.documentElement.scrollTo(0,0) + document.body.scrollTo(0,0));
        window.addEventListener("unload", alCerrar);
    }

    document.addEventListener('DOMContentLoaded', init);
}
