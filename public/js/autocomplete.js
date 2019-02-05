(function() {
	var searchElement = document.getElementbyId('search'),
	results = document.getElementbyId('results'),
	selectedResult= 1,
	previousRequest, 
	previousValue = searchElement.value;

	
	function getResults(keywords){
		var xhr = newXMLHttpRequest();
		xhr.open('GET', './search.php?s'+ encodedURIComponent(keywords));
		xhr.addEventListener('readystatechange', function(){
			if(xhr.readyState == XmlHttpRequest.DONE && xhr.status == 200){
				displayResults(xhr.responseText);
			}
		});
		xhr.send(null);
		return xhr;
	}
	
	function displayResults(response){
		results.style.display = response.length ? 'block' : 'none';
		if (response.length){
			response = response.split('|');
			var responselen = response.length;
			results.innerHTML = '';
			for (var i=0, div; i< responselen ; i++){
				div = results.appendChild(document.createElement('div'));
				div.innerHTML = response[i];
				div.addEventListener('click', function(e){
					chooseResult(e.target);
				});
			}
		}
	}
	
	function chooseResult(result){
		searchElement.value = previousValue = result.innerHTML;
		results.style.display = 'none';
		result.className = '';
		selectedResult = -1;
		searchElement.focus();
	}
	
	searchElement.addEventListener('keyup', function(e){
		var divs = results.getElementsByTagName('div');
		if(e.keyCode == 38 && selectedResult > -1){
			divs[selectedResult--].className = '';
			if(selectedResult > -1){
				divs[selectedResult].className = 'result_focus';
			}
		}
	
		else if (e.keyCode == 40 && selectedResult < divs.length - 1){
			divs[selectedResult].className = '';
		}
	
	divs[++selectedResult].className = 'result_focus';
	}
	
	else if(searchElement.value != previousValue){
		previousValue = searchElement.value;
		
		if(previousRequest && previousRequest.readyState < XmlHttpRequest.DONE){
			previousRequest.abort();
		}
			previousRequest = getResults(previousValue);
		
			selectedResult = -1;
	}
});

})();


