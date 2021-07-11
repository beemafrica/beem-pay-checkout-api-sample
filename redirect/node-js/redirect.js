const axios = require('axios');
const url = 'https://checkout.beem.africa/v1/checkout';
const https = require('https');
const btoa = require('btoa');

const api_key = '<api_key>';
const secret_key = '<secret_key>';

const payload = {
    amount: '<amount>',
    reference_number: '<reference_number>',
    mobile: '<mobile>',
    sendSource: '<sendSource>',
    transaction_id: '<transaction_id>',
   };


function getCheckout() {
   axios
   .get(url,payload,{
      headers: {
        'Content-Type': 'content_type',
       Authorization: 'Basic ' + btoa(api_key + ':' + secret_key),
     },
      httpsAgent: new https.Agent({
       rejectUnauthorized: false,
      }),
   })
    .then((res) => {
    // sendSource as true 
    if (res.request.responseURL) {
        window.location.href = res.request.responseURL;
       }
    //sendSource as false
    // console.log(response.data));    
    })
    .catch((error) => console.error(error.response.data))

}

getCheckout();