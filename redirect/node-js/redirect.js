const axios = require("axios");
const https = require("https");
const btoa = require("btoa");

const url = "https://checkout.beem.africa/v1/checkout";
const api_key = "<API_KEY>";
const secret_key = "<SECRET_KEY>";
const beem_secure_token = "<SECURE_TOKEN>";
const content_type = "application/json";

let payload = {
  headers: {
    "Content-Type": content_type,
    Authorization: "Basic " + btoa(api_key + ":" + secret_key),
    "beem-secure-token": beem_secure_token,

  },
  params: {
    amount: "<amount>",
    reference_number: "<reference_number>",
    mobile: "<mobile>",
    sendSource: "<sendSource>",
    transaction_id: "<transaction_id>",
  },
};

function getCheckout() {
  axios
    .get(url, payload, {
      httpsAgent: new https.Agent({
        rejectUnauthorized: false,
      }),
    })
    .then((res) => {
      console.log(res);
      // sendSource as true
      if (res.request.responseURL) {
        window.location.href = res.request.responseURL;
      }
      //sendSource as false
      console.log(res.data);
    })
    .catch((error) => console.error(error.response.data));
}

getCheckout();
