
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
    import '../../sass/style.scss';
    import AllFacts from './AllFacts/AllFacts';
    // import '../../sass/_variables.scss';

    class App extends Component {
        constructor(props){
            super(props);
            this.state= {}
            // pulled_data= true
              
            
        }
        render() {
            return (
              <Router>
                <Switch>
                <Route exact path="/" component={Home} />
                <Route path="/allfacts" component={AllFacts} />
              </Switch>
              </Router>
              // <div>
              //  <Home />
              // </div>
                
            );
        }
    }

    ReactDOM.render(<App />, document.getElementById('app'))