const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: false }));
app.use(express.json());

app.post("/", (req, res) => {
const {
   amount,
   referenceNumber,
   status,
   timestamp,
   transactionID,
   msisdn
} = req.body;

 // Your logic here ... 

 return res.json({
   amount,
   status,
   referenceNumber,
   statusMessage,
   transactionID,
});

});

app.listen(7000, () => {
console.log("app running on port 7000");
});