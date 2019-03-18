import React from 'react';
import axios from 'axios';

export default class AllFacts extends React.Component {
    constructor() {
        super();
        this.state = {
            name: '',
            persons: []
          }
          this.handleChange= this.handleChange.bind(this)
          this.handleSubmit= this.handleSubmit.bind(this)
    }
  

  handleChange (event) {
    this.setState({ name: event.target.value });
  }

  handleSubmit (event) {
    event.preventDefault();
    var token= document.getElementById('_token').value;
    console.log(token);
    const user = {
      name: this.state.name,
      method: 'POST',
      type:'varun',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
    };

    // axios.post(`/factapi`, { user })
    //   .then(res => {
    //     console.log(res);
    //     console.log(res.data);
    //   })
    // axios.get(`factsapilike/store`)
    //     .then(res => {
    //     const persons = res.data;
    //     this.setState({ persons });
    //     console.log(persons);
    // })

    axios.post('http://127.0.0.1:8000/factsapilike/store', user, {
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'X-Requested-With': 'XMLHttpRequest',
                }
            }).then(
                response => console.log(response.data)
            ).catch(
                error => console.log(error)
            )
  }

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
        <input type="hidden" id="_token" name="_token" value="ahHxTg9a3IFUSSX0mjJ8mPBNA9FgiSetZpweVxwE" />
          <label>
            Person Name:
            <input type="text" name="name" onChange={this.handleChange} />
          </label>
          <button type="submit">Add</button>
        </form>
      </div>
    )
  }
}