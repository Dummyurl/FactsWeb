
    import React, { Component } from 'react'
    import { Link } from 'react-router-dom'

    class Facts extends Component {
        constructor(props){
            super(props);
            this.state= {
                facts: []
            }
        }
        componentDidMount () {
            axios.get('/factapi').then(response => {
              this.setState({
                facts: response.data
                
              })
              console.log(response.data);
              console.log(facts[0]);
            })
          }

        render() {
            // const studentsAge = [17, 16, 18, 19, 21, 17];

            const { facts } = this.state
            
            const description = facts.map((rowdata,i)=>
                <div key={i}>
                    {
                        rowdata.home.map((subRowData,k)=>
                            <div key={k}>
                                <img style={pStyle} src={subRowData.image}></img>
                                <label>{subRowData.description}</label>
                                <label style={category_head} className="category_head">{subRowData.category_title}</label>
                                {/* <label></label> */}
                            </div>  
                        )   
                    }
                </div>  
            )
            // const categories = 

            return (
                <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Facts</div>

                            <div className="card-body">
                            {
                                description
                            }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                )
        }
    }
    const pStyle = {
         width: '650px',
         height: '419px'
      };
    const  category_head={
            background: '#FFD800',
            borderRadius: '30px',
            textTransform: 'uppercase',
            boxSizing: 'border-box',
            padding: '7px 21px',
            fontWeight: 400,
            fontSize: '13px'
        }  
   export default Facts;