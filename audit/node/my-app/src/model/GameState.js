import { createContext, useMemo, useState } from 'react';

/** @typedef {'x'|'0'|null} */
let CellState

/** @typedef {'x'|'0'|null} */
let WinnerState

/** @typedef {Array<Array<CellState>>} */
let PlayingFieldState

/**
 * @typedef {{
 *   playingField: PlayingFieldState,
 *   winner: Winner,
 *   player: PlayerState,
 * }}
 */
let GameState

/**
 * @type {PlayingFieldState}
 */
const initialPlayingFieldState = [
	[null, null, null],
	[null, null, null],
	[null, null, null],
]

/**
 * @type {GameState}
 */
const initialGameState = {
	playingField: initialPlayingFieldState,
	winner: null,
}

const GameStateContext = createContext()

function GameStateProvider(props) {
	const [gameState, setGameState] = useState(initialGameState)
	const value = useMemo(() => [gameState, setGameState], [gameState])
	return <GameStateContext.Provider value={value} {...props} />
}

export {
	GameStateContext,
	GameStateProvider,
	initialGameState,
}