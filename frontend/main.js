
const baseUrl = 'http://localhost:10080/yuzunoha/teach-api1/api/v1/';
const url = baseUrl + 'aaa/123/bbb?keyc=ccc&keyd=ddd';

console.log(url);

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