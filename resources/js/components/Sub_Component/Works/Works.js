import React, { Component } from 'react';
import HeaderBar from '../../HeaderBar/HeaderBar'
import Footer from '../../Footer/Footer'

class Works extends Component {
    constructor(props) {
        super(props);
        this.state = {  }
    }
    render() { 
        return (
            <div>
            <HeaderBar />
            <h3>Work Page</h3> 
            <Footer />
            </div>
            );
    }
}
 
export default Works;