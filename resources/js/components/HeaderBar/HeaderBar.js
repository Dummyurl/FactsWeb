import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";


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
                <Link to="/" className=" no-decoration menu__item menu__item--active">
                    Homepage</Link>
                <Link className="no-decoration menu__item" to="/about">About</Link>
                <Link className="no-decoration menu__item" to="/service">Services</Link>
                <Link className="no-decoration menu__item" to="/work">Works</Link>
                <Link className="no-decoration menu__item" to="/contact">Contact</Link>
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