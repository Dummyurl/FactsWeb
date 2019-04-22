import React from 'react'
import HeaderBar from '../HeaderBar/HeaderBar';
import Fade from 'react-reveal/Fade';
import Bounce from 'react-reveal/Bounce';
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
            <Fade bottom duration={1000} distance={"20px"}>
              <h1 className="heroleft__header">FACTS</h1>
            </Fade>
            <Fade bottom duration={1100} distance={"20px"}>
              <h4>Research & analytics</h4>
            </Fade>
            <Fade bottom duration={1200} distance={"20px"}>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                architecto voluptatum voluptate dolores ad est, ea rerum
                laboriosam assumenda culpa?
              </p>
            </Fade>
            <Fade bottom duration={1200} distance={"30px"}>
              <button className="btn btn-primary btn-lg heroleft__btn "> <span className="fom"> Find Out More</span>
                <i className="la la-arrow-right"></i>
              </button>
            </Fade>
          </div>
          <div className="col-md-7  d-none d-md-block rtpanel">
            <div className="relative">
                {/* <svg xmlns="http://www.w3.org/2000/svg" preserveaspectratio="none" width="175.398" height="183.107" viewBox="0 0 175.398 183.107">
                        <g id="Group_192" data-name="Group 192" transform="translate(-960.693 -387)">
                            <path id="Path_548" data-name="Path 548" d="M366.791,221.952l82.1-173.246a4.77,4.77,0,0,1,8.609-.037l.015.031.005.009L541.1,222.225a4.772,4.772,0,0,1-4.294,6.842v.011H370.957a4.782,4.782,0,0,1-4.166-7.126Z" transform="translate(594.516 341.028)" fill="#880018" fill-rule="evenodd" />
                            <rect id="first" data-name="Rectangle 1649" width="12.865" height="72.25" transform="translate(1000.737 496.786)" fill="#fff" />
                            <rect id="second" data-name="Rectangle 1650" width="12.861" height="93.268" transform="translate(1021.354 475.767)" fill="#fff" />
                            <rect id="third" data-name="Rectangle 1651" width="12.858" height="114.992" transform="translate(1041.971 454.042)" fill="#fff" />
                            <rect id="fourth" data-name="Rectangle 1652" width="12.855" height="72.25" transform="translate(1083.201 496.786)" fill="#fff" />
                            <rect id="fifth" data-name="Rectangle 1653" width="12.861" height="93.268" transform="translate(1062.587 475.767)" fill="#fff" />
                        </g>
                    </svg> */}
                <Fade bottom duration={1300} distance={"20px"}>
                    <img className="backtriangle" src="img/factbars.png" alt="logo" />
                </Fade>
                <Fade bottom duration={1300} delay={500} distance={"20px"}>
                    <img className="rel" src="img/man.png" alt="search" />
                </Fade>
                <Bounce duration={1300} delay={1000} >
                    <img className="searchp" src="img/search.png" alt="man" />
                </Bounce>


              </div>
          </div>
        </div>
      </div>
    </section>
    )

    export default Header