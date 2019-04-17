
    import React, { Component } from 'react'
    import ReactDOM from 'react-dom'
    // import { BrowserRouter, Route, Switch } from 'react-router-dom'
    import { BrowserRouter as Router, Route, Link,Switch } from "react-router-dom";
    import 'bootstrap/dist/css/bootstrap.css';
    import Home from './Home';
    
    // import AllFacts from './AllFacts/AllFacts';
    // import LoaderBar from './LoaderBar';
    // import Slider from './Slider';
    // import Slides from './Slides'
    // import PollData from './Polloftheday';
    import 'pace-js'
    import 'pace-js/themes/red/pace-theme-minimal.css'
    import '../../sass/style.scss';
    import AllFacts from './AllFacts/AllFacts';
    // import Contact from './Contact/Contact';

    import About from './Sub_Component/About/About';
    import Service from './Sub_Component/Service/Service';
    import Works from './Sub_Component/Works/Works';
    import Contact from './Sub_Component/Contact/Contact';
    // import '../../sass/_variables.scss';

    class App extends Component {
        constructor(props){
            super(props);
            this.state= {}
            // pulled_data= true
              
            
        }
        render() {
            return (
              <div className="App Fade">
                <Router>
                  <Switch>
                  <Route exact path="/" component={Home} />
                  <Route path="/allfacts" component={AllFacts} />
                  <Route path="/about" component={About} />
                  <Route path="/service" component={Service} />
                  <Route path="/work" component={Works} />
                  <Route path="/contact" component={Contact} />
                </Switch>
                </Router>
              </div>
              // <div>
              //  <Home />
              // </div>
                
            );
        }
    }

    ReactDOM.render(<App />, document.getElementById('app'))