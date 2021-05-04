import './App.css';
import { GameStateProvider } from './model/GameState'
import { PlayingField } from './view/PlayingField'

function App() {
  return (
    <div className="app">
      <GameStateProvider>
           <header className='title'>Tic-Tac-Toe</header>
           <PlayingField></PlayingField>
      </GameStateProvider>
    </div>
  );
}

export default App;
