const url = 'http://localhost:10080/teach-api1/api/v1/sign_up.php';

const array = [
  'あいう',
  'かきく',
  'ABC',
  '123'
];

const requestJson = JSON.stringify(array);

console.log('requestJson', requestJson);

fetch(url, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: requestJson,
})
  .then(res => res.json())
  .then(responseJson => {
    console.log('responseJson', responseJson);
  })
  .catch(console.error);