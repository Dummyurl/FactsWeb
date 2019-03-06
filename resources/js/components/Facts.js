
    import React, { Component } from 'react'
   

    class Facts extends Component {
        constructor(props){
            super(props);
            this.state= {
                fact: ["We Have A Fact With Us.","Varun Pradhan ","Deepak Pradhan"]
            }
        }
        render() {
            return (
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-md-8">
                            <div className="card">
                                <div className="card-header">Facts</div>
    
                                <div className="card-body">
                                    <ul>
                                        {this.state.fact.map(item => (
                                            <li key={item}>{item}</li>
                                        ))}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            );
        }
    }

   export default Facts;