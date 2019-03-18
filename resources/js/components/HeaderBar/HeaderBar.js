import React, { Component } from 'react';


class HeaderBar extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(
            <header className="flex" style={headerbar}>
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
            </header>
        )
    }
}
const headerbar={
    padding: '0.7894736842rem',
    background: '#f5efef'
}
export default HeaderBar;