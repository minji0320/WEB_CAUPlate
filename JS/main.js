var prompts = [
{
	prompt: '현재 후문과 가까이 있다',
	weight: -1,
	class: 'group0'
},
{
	prompt: '오늘은 한식이 땡긴다.',
	weight: -1,
	class: 'group1'
},

{
	prompt: '오늘은 먹는데 돈을 아끼지 않을 것이다.',
	weight: -1,
	class: 'group0'
},
{
	prompt: '같이 먹는 일행이 많다',
	weight: -1,
	class: 'group0'
}


]

var prompt_values = [
{
	value: '매우 그렇다',
	class: 'btn-default btn-strongly-agree',
	weight: 4
},
{
	value: '조금 그렇다',
	class: 'btn-default btn-agree',
	weight: 3,
},
{
	value: '별로 그렇지 않다',
	class: 'btn-default',
	weight: 2
},
{
	value: '매우 그렇지 않다',
	class: 'btn-default btn-disagree',
	weight: 1
},
]

function createPromptItems() {

	for (var i = 0; i < prompts.length; i++) {
		var prompt_li = document.createElement('li');
		var prompt_p = document.createElement('p');
		var prompt_text = document.createTextNode(prompts[i].prompt);

		prompt_li.setAttribute('class', 'list-group-item prompt');
		prompt_p.appendChild(prompt_text);
		prompt_li.appendChild(prompt_p);

		document.getElementById('quiz').appendChild(prompt_li);
	}
}

function createValueButtons() {
	for (var li_index = 0; li_index < prompts.length; li_index++) {
		var group = document.createElement('div');
		group.className = 'btn-group btn-group-justified';

		for (var i = 0; i < prompt_values.length; i++) {
			var btn_group = document.createElement('div');
			btn_group.className = 'btn-group';

			var button = document.createElement('button');
			var button_text = document.createTextNode(prompt_values[i].value);
			button.className = 'group' + li_index + ' value-btn btn ' + prompt_values[i].class;
			button.appendChild(button_text);

			btn_group.appendChild(button);
			group.appendChild(btn_group);

			document.getElementsByClassName('prompt')[li_index].appendChild(group);
		}
	}
}

createPromptItems();
createValueButtons();

var total = 0;

function findPromptWeight(prompts, group) {
	var weight = 0;

	for (var i = 0; i < prompts.length; i++) {
		if (prompts[i].class === group) {
			weight = prompts[i].weight;
		}
	}

	return weight;
}

function findValueWeight(values, value) {
	var weight = 0;

	for (var i = 0; i < values.length; i++) {
		if (values[i].value === value) {
			weight = values[i].weight;
		}
	}

	return weight;
}

$('.value-btn').mousedown(function () {
	var classList = $(this).attr('class');
	var classArr = classList.split(" ");
	var this_group = classArr[0];

	if($(this).hasClass('active')) {
		$(this).removeClass('active');
		total -= (findPromptWeight(prompts, this_group) * findValueWeight(prompt_values, $(this).text()));
	} else {
		total -= (findPromptWeight(prompts, this_group) * findValueWeight(prompt_values, $('.'+this_group+'.active').text()));
		$('.'+this_group).removeClass('active');

		$(this).addClass('active');
		total += (findPromptWeight(prompts, this_group) * findValueWeight(prompt_values, $(this).text()));
	}

	console.log(total);
})



$('#submit-btn').click(function () {
	$('.results').removeClass('hide');
	$('.results').addClass('show');

	if(total = 16) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=9';
  }
  else if(total = 15) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=10';
  }
  else if(total = 14) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=3';
  }
  else if(total = 13) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=4';
  }
  else if(total = 12) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=5';
  }
  else if(total = 11) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=6';
  }
  else if(total = 10) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=7';
  }
  else if(total = 9) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=8';
  }

  else if(total = 8 ) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=24';
  }

  else if(total = 7) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=23';
  }
	else if(total = 6) {
    window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=22';
  }
	else if(total = 5) {
		window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=20';
	}
	else{
		window.location.href = 'http://cauplate.dothome.co.kr/detailView.php?id=19';
	}

	// Hide the quiz after they submit their results
	$('#quiz').addClass('hide');
	$('#submit-btn').addClass('hide');
	$('#retake-btn').removeClass('hide');
})

$('#retake-btn').click(function () {
	$('#quiz').removeClass('hide');
	$('#submit-btn').removeClass('hide');
	$('#retake-btn').addClass('hide');

	$('.results').addClass('hide');
	$('.results').removeClass('show');
})
