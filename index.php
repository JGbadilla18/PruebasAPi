
'use strict';
const axios = require('axios');
const {google} = require('googleapis');


const exelId = "https://docs.google.com/spreadsheets/d/1qaC8kBpAsQb8708zFrDrrSPfVH6eVQWYi6thK4gtNKE/edit#gid=0";
 const serviceAccount = {"type": "service_account", 
 "project_id": "bancasimulador-ocwakw",
  "private_key_id": "82e87569c779369d56c2e67e31d0011fc71675f4",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDPRrVgfVn5gqn1\nMgJCEufTIoxLoWNpMALq8qBqyI7wBzGmLjf7vk5rvZWUxxCtxcDQ9Vv6tV+SCPoo\ngYYhGA8PmT4etO1JOruquZA351k5y7Y6fugG6ed4w74qbLim3kdldYNiMZlOQpps\nwwVIkVCGM/d3d0DoWcVmiBcZbCJyTJnH9kaVXcVkpMwOtt3eGDifea4anw3tr6pD\n6kxSG7CH/tHxn6klYTsHCxsJpkydlbbgsvjIT2NkxWcSoh0qikA8bqTjvYxst/ok\ntD6BTnm3Lieeprsbx7Zw9uiRUqckgEexXRRJqIjOjFjVdV29TVSYMReYFOORX8aV\n2dHTRUjTAgMBAAECggEAIbYI0B7NsDhxnEOGvX37U/Sq/QP3D0ez5HK952V4uzjC\n+O73GPZXJSEU6mPD5oH3/aQ3fPDcZdEYSoKNBjs2UTL7DkhzzTSvCrHFGb/X3FVc\nQmrwdsC6blg7ngUdCmVdbEwZUweTvPg1IG+eyjIkIWeN8yajQ7GSBZPTBJtN25PR\n2ECZQOY8xEWCLmTAF/b23s8DGt8ID0V/jEIa/BGowMabIvYhz+xOjfGKG+Do50ix\ntLFEAnRzI5qIFXGz+V25bLzAURkAesinXAC04Z7ybo3xdKK6i49z6ptSwnt3ItJd\nZwxnn2vjw7D9a78Qw9/K4spnByWkWLUiSnEUFn46ZQKBgQDnA4XWva+4VcohVYRC\norvC2G1vRJVEU4X57052BAKql9OQPYOHnPH93/5UHeZr/fvQ3D4j+P/J0+zljSMI\n4c5f+dI79w/tOAIH/H/5COlXbFGHj1gyUVgFTkHrnTjIFWXfsAABj9cP/XoPtYwb\nH5kcjwxR9g2+Zv0w9/N+gWhzhQKBgQDlsexHmdrNy5w0xnDojzu+duAy/Xzo4spx\ndESv8t8NipLg/KYR2R1rWTRZTWegODDdmRL+nX7N5RuFzRsp8DhaOghOzAXH4YOx\njs9ZGMr/3wFvn1DseyVn653k89sAl71N9M6Vmyvjzy8WjcjAh6qaAXN5YjyrK+07\n+yzjedYedwKBgDBfaXgU0iW8OQ4P1RkK8FwVa5zf9I2RG73BIWHO5ywHjLJoXxFX\niMiLTbsZY7V7Qm5yn8RykEUXzkQm8I4cklVAf4g07K3Ui4BWnAlul0XKFaxYFLS8\nmbzKrT0D9+7VpDZZqTaqgvMDNbryXfsT+8CiJ4dGCYy0DhJh6Se1O0TtAoGBAJbk\njHD5HKlnIeX1mwTb24ai92Pn7J/dJNrlY54msetmZlkRAFPnSpFT17T2yaWSZF+f\nCMBlXIEMCkma1UZ2vb5gM0b4dq+5cVc6lvJT/D+dE4dtpK7Fs2wSd/aJUAySolTN\nBs13U5zjZW6uk/wO478qRt6t72cPg1iNCA8j4cq/AoGALgkur20yxOBTHjIAJ/zA\n7cijyG+m1EbPTCsuFPP6aS5p5K9V+X2SLZUeX/CLPyeEjt0GRCC05/9CgCe6SGzc\n1H8PWYDqesnkLUJRQkXo6EyA1K1ywMyEw3fEdj1tuHXfB9f6uPwKnqo1Cn4WjKj9\nE4a2rxZPCCNsz3/4HRZ65DU=\n-----END PRIVATE KEY-----\n",
  "client_email": "bancasimulador-ocwakw@appspot.gserviceaccount.com",
 "client_id": "100582693017993087874",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/bancasimulador-ocwakw%40appspot.gserviceaccount.com"
};

 
const functions = require('firebase-functions');
const {WebhookClient} = require('dialogflow-fulfillment');
const {Card, Suggestion} = require('dialogflow-fulfillment');



process.env.DEBUG = 'dialogflow:debug'; // enables lib debugging statements
 
exports.dialogflowFirebaseFulfillment = functions.https.onRequest((request, response) => {
  const agent = new WebhookClient({ request, response });
  console.log('Dialogflow Request headers: ' + JSON.stringify(request.headers));
  console.log('Dialogflow Request body: ' + JSON.stringify(request.body));
 
  function welcome(agent) {
    agent.add(`Welcome to my agent!`);
  }
 
  function fallback(agent) {
    agent.add(`I didn't understand`);
    agent.add(`I'm sorry, can you try again?`);
  }

  const express = require("express");
  const bodyParser = require("body-parser");


  const restService = express();

  restService.use(
    bodyParser.urlencoded({
      extended: true
    })
  );

  restService.use(bodyParser.json());

  restService.post("/echo", function(req, res) {
    var speech =
      req.body.queryResult &&
      req.body.queryResult.parameters &&
      req.body.queryResult.parameters.echoText
        ? req.body.queryResult.parameters.echoText
        : "Seems like some problem. Speak again."+req.body;
    return res.json({

    "fulfillmentText": speech,
    "fulfillmentMessages": [
      {
        "text": {
          "text": [speech]
        }
      }
    ],
    "source": "<webhookpn1>"


    });
  });


  restService.listen(process.env.PORT || 8000, function() {
    console.log("Server up and listening");
  });

    // Run the proper function handler based on the matched Dialogflow intent name
    let intentMap = new Map();
    intentMap.set('Default Welcome Intent', welcome);
    intentMap.set('Default Fallback Intent', fallback);
    //intentMap.set('Depositos', depositosHandler);

    agent.handleRequest(intentMap);
  });
