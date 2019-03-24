    import React, { Component } from 'react'
    // import ReactDOM from 'react-dom'
    
    import Header from './Header/Header'
    import FactsPoll from './FactsPoll/FactsPoll'
    import Services from './Services/Services'
    import Initiatives from './Initiatives/Initiatives'
    import HappyClients from './HappyClients/HappyClients'
    import Footer from './Footer/Footer'



class Home extends Component {
    constructor(props){
        super(props);
        this.state= {}
        // pulled_data= true
          
        
    }
    render() {
        return (
          <div>
            <Header />
            <FactsPoll />
            <Services />
            <Initiatives />
            <HappyClients />
            <Footer />
          </div>
            
        );
    }
}
export default Home ;