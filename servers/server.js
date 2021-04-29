const http = require('http');

const hostname = 'localhost';
const port = 3000;

const server = http.createServer((req, res) => {
	res.statusCode = 200;
  	res.setHeader('Content-Type', 'text/plain');
  	res.end('server node demarer avec succes!\n');
});
// console.log(server);
server.listen(port, hostname, () => {
  	console.log(`Server running at http://${hostname}:${port}/`);
});