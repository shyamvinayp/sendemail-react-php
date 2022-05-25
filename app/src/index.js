import React from 'react';
import ReactDOM from 'react-dom';
import Form from '../src/components/Form';

/**
 *
 * @type {{
 * errorMessage: string,
 * description: string,
 * api: string,
 * title: string,
 * fields: {email: string},
 * successMessage: string,
 * fieldsConfig: [{isRequired: boolean, fieldName: string, klassName: string, id: number, label: string, placeholder: string, type: string}]}}
 */
const config = {
  api: `${process.env.REACT_APP_API}`,
  title: 'Send Email',
  description: 'Jokes can send to many recipients/emails comma (,) separated ',
  successMessage: 'Email sent successfully to the respected recipients.',
  errorMessage: 'Please fill the form',
  fields:{
    email: '',
  },
  fieldsConfig:  [
   { id: 1, label: 'Email', fieldName: 'email', type: 'email', placeholder: ' Your Email', isRequired: true , klassName:'email-field'},
  ]
}
ReactDOM.render(<Form config={config} />, document.getElementById('root'));
