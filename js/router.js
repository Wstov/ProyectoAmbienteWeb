class Router {
  // Constructor
  constructor(paths) {
    this.paths = paths;
    this.initRouter();
  }

  //inicia el router
  initRouter() {
    const {
      location: { pathname = "/" },
    } = window;
    const URI = pathname === "/" ? "home" : pathname.replace("/", "");
    this.load(URI);
  }

  // Cargar las vistas
  load(page = "home") {
    const { paths } = this;
  }
}
