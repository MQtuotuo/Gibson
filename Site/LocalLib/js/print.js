// JavaScript Document
  
var data = [], fontSize = 12, height = 0, doc;
			doc = new jsPDF('p', 'pt', 'a4', true);
			doc.setFont("times", "normal");
			doc.setFontSize(fontSize);
			doc.text(20, 10, "hi table");
			function generate() {
				data = doc.tableToJson('table');
				height = doc.drawTable(data, {
					xstart : 10,
					ystart : 10,
					tablestart : 70,
					marginleft : 10
				});
				doc.text(50, height + 20, 'hi world');
				doc.save("mypoll.pdf");
			};
			
			function printpdf() {
				data = doc.tableToJson('table');
				height = doc.drawTable(data, {
					xstart : 10,
					ystart : 10,
					tablestart : 70,
					marginleft : 10
				});
				doc.text(50, height + 20, 'hi world');
				doc.output('datauri');
			};
