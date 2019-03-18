import React from 'react'
import HeaderBar from '../HeaderBar/HeaderBar'
// import './header.scss';

    import { Link } from 'react-router-dom'

    const Header = () => (
      <section className="hero-image">
      <HeaderBar />
      {/* <header className="flex">
        <figure>
          <img src="img/factslogo.png" alt="Facts Nepal" />
        </figure>
        <nav className="menu flex ml-a">
          <a href="homepage.html" className=" no-decoration menu__item menu__item--active">
            Homepage</a>
          <a href="about.html" className=" no-decoration menu__item ">About</a>
          <a href="services.html" className=" no-decoration menu__item">Services</a>
          <a href="work.html" className="no-decoration menu__item ">Works</a>
          <a href="contact.html" className="no-decoration menu__item"> Contact</a>
          <div className="nav__hamburger none">
            <i className="la la-bars"></i>
          </div>
        </nav>
      </header> */}
      <div className="container">
        <div className="row">
          <div className="col-md-5">
            <h1 className="heroleft__header">FACTS</h1>
            <h4>Research & analytics</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
              architecto voluptatum voluptate dolores ad est, ea rerum
              laboriosam assumenda culpa?
            </p>
            <button className="btn btn-primary btn-lg heroleft__btn "> <span className="fom"> Find Out More</span>
              <i className="la la-arrow-right"></i>
  
            </button>
          </div>
          <div className="col-md-7  d-none d-md-block">
            <div className="img-wpr">
              <img src="img/assets/banner.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    )

    export default Header