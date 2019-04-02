    import React, { Component } from 'react'
    // import ReactDOM from 'react-dom'
    
    import Header from './Header/Header'
    import FactsPoll from './FactsPoll/FactsPoll'
    import Services from './Services/Services'
    import Initiatives from './Initiatives/Initiatives'
    import HappyClients from './HappyClients/HappyClients'
    import Footer from './Footer/Footer'
    // import ScrollReveal from 'scrollreveal'
    import Fade from 'react-reveal/Fade';
    



class Home extends Component {
    constructor(props){
        super(props);
        this.state= {}
        // ScrollReveal().reveal('.Scrollreveal');
        // pulled_data= true
          
        
    }
    render() {
        return (
          <div className="Scrollreveal">
          <Fade top big>
            <Header />
            <FactsPoll />
            <Services />
            <Initiatives />
            <HappyClients />
            <Footer />
            </Fade>
          </div>
            
        );
    }
}
export default Home ;