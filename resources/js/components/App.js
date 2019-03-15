
    import React, { Component } from 'react'
    import ReactDOM from 'react-dom'
    // import { BrowserRouter, Route, Switch } from 'react-router-dom'
    import { BrowserRouter as Router, Route, Link } from "react-router-dom";
    import 'bootstrap/dist/css/bootstrap.css';
    // import '../../../resources/css/line-awesome.min.css';
    // import '../../../public/css/line-awesome.min.css';
    // import '../../../public/css/line-awesome-font-awesome.css';
    // import 'line-awesome/css/line-awesome-font-awesome.css';
    // import 'line-awesome/css/line-awesome.min.css';
    // import Facts from './Facts';
    import Header from './Header/Header'
    import FactsPoll from './FactsPoll/FactsPoll'
    import Services from './Services/Services'
    import Initiatives from './Initiatives/Initiatives'
    import HappyClients from './HappyClients/HappyClients'
    import Footer from './Footer/Footer'
    
    // import LoaderBar from './LoaderBar';
    // import Slider from './Slider';
    // import Slides from './Slides'
    // import PollData from './Polloftheday';
    import '../../sass/style.scss';
    // import '../../sass/_variables.scss';

    class App extends Component {
        constructor(props){
            super(props);
            this.state= {}
            // pulled_data= true
              
            
        }
        render() {
            return (
              // <Router>
              //   <div>
              //     <ul>
              //       <li>
              //         <Link to="/">Home</Link>
              //       </li>
              //       <li>
              //         <Link to="/about">About</Link>
              //       </li>
              //       <li>
              //         <Link to="/topics">Topics</Link>
              //       </li>
              //     </ul>

              //     <hr />

              //     <Route exact path="/" component={Home} />
              //     <Route path="/about" component={About} />
              //     <Route path="/topics" component={Topics} />
              //   </div>
              // </Router>
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

    ReactDOM.render(<App />, document.getElementById('app'))