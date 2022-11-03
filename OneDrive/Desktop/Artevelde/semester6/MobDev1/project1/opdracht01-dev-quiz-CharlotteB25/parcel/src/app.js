import Quiz from './quiz.js';

class Settings {
  constructor() {
    this.quizElement = document.querySelector('.quiz');
    this.settingsElement = document.querySelector('.settings');
    this.category = document.querySelector('#category');
    this.numberOfQuestions = document.querySelector('#questions');
    this.difficulty = [
      document.querySelector('#easy'),
      document.querySelector('#medium'),
      document.querySelector('#hard'),
    ];
    this.startButton = document.querySelector('#start');

    this.quiz = { };

    this.startButton.addEventListener('click', this.startQuiz.bind(this));
  }

  async startQuiz() {
    try {
      const amount = this.getAmount();
      const categoryId = this.category.value;
      const difficulty = this.getCurrentDifficulty();

      const url = `https://quizapi.io/api/v1/questions?apiKey=RLeUA0WA2MKxtzCUFicrg3c9nLHHxO5sZ8RCHqQW&category=${categoryId}&difficulty=${difficulty}&limit=${amount}`;

      let data = await this.fetchData(url);
      this.quiz = new Quiz(this.quizElement, amount, data.results);
    } catch (error) {
      alert(error);
    }
  }
  async fetchData(url) {
    const response = await fetch(url);
    const result = await response.json();


    return result;
  }

  getCurrentDifficulty() {
    const checkedDifficulty = this.difficulty.filter(element => element.checked);

    if (checkedDifficulty.length === 1) {
      return checkedDifficulty[0].id;
    } 
  }

  getAmount() {
    const amount = this.numberOfQuestions.value;
    // Not negative, not 0 and not over 50
    if (amount > 0 && amount < 51) {
      return amount;
    }
    throw new Error('Please enter a number of questions between 1 and 50!');
  }
}

export default Settings;