import React,{ Component } from 'react';

class Initiatives extends Component {
    constructor(props){
        super(props)
        this.state={
            initiatives:[]
        }
    }
    componentDidMount () {
        axios.get(`/inititivesapi`).then(response => {
          this.setState({
            initiatives: response.data
          })
          console.log(this.state.initiatives);
        })

      }
      
    render () {
        const { initiatives } = this.state
        return(
            <section className="section-padding-y initiatives">
                
                    
                <div className="container">
                    <div className="row">
                        <div className="col-md-3">
                            <div className="left-title">
                                <h3>Our Initiatives</h3>
                                <p>several of them er asked how
                                satisfied they are with our services.
                                here are their statement
                                </p>
                            </div>
                        </div>
                        <div className="col-md-9">
                            <div className="row   five">
                    {initiatives.map((item,i)=>
                        item.ourinititives.map((company, j) =>
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {/* Contest */}
                                        {company.title}
                                        </h6>
                                        <div className="ii__img">
                                        <img src={company.image} alt="trophy" />
                                        </div>
                                        <p className="ii__description mb-3">
                                        {company.shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                        ))}
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </section>
        )
    }
}
export default Initiatives;