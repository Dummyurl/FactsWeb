import React,{Component} from 'react';

class NewComponent extends Component {
  render() {
    return (
      <div>
        Poll Result
      </div>
    );
  }  
}
class PollData extends Component {
    constructor(props){
        super(props);
        this.state= {
            poll_details: [],
            clicked: false
        }
          this.handleClick = this.handleClick.bind(this);
    }
        handleClick() {
          this.setState({
            clicked: true
          });
        }
    
    componentDidMount () {
        axios.get('/publicpoll').then(response => {
          this.setState({
            poll_details: response.data
            
          })
          console.log(response.data);
        })
      }
    render(){
        const { poll_details } = this.state
        const poll_question= poll_details.map((poll_data,i)=>
           <div>
                <label>{poll_data.question}</label>
                <div className="poll_opt">
                {
                    poll_data.options.map((poll_options,j)=>
                        <button onClick={this.handleClick}>{poll_options.question}</button>
                        
                    )
                }
                </div>
            </div>
        )
        return(
            <div style={pollstyle}>
                <h3>Varun</h3>
                {poll_question}
                {this.state.clicked ? <NewComponent /> : null}
                {/* <label>sdasdsa</label> */}
            </div>
        )
    }
}


const pollstyle={
    border: '2px solid red',
    width: '275px',
    height: '295px',
    position: 'absolute',
    boxShadow: '6px 5px 3px #aaaaaa',
    padding: '35px'
}
export default PollData; 