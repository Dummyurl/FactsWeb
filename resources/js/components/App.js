
    import React, { Component } from 'react'
    import ReactDOM from 'react-dom'
    import { BrowserRouter, Route, Switch } from 'react-router-dom'
    import Facts from './Facts';
    import Header from './Header'
    import LoaderBar from './LoaderBar';
    import Slider from './Slider';
    import Slides from './Slides'

    class App extends Component {
        constructor(props){
            super(props);
            this.state= {}
              
            
        }
        render() {
            return (
                <BrowserRouter>
            <div>
              <Header />
              <Slides />
                <Facts />
                
                {/* <Slider /> */}
                <LoaderBar />
                
                
              {/* <Switch>
                
                <Route path='/facts' component={Facts} />
                
              </Switch> */}
            </div>
          </BrowserRouter>
                
            );
        }
    }

    ReactDOM.render(<App />, document.getElementById('app'))