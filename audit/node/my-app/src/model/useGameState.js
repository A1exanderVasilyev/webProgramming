import { useContext } from 'react';
import { GameStateContext, initialGameState } from './GameState';

function getRandomInt(min, max) {
	min = Math.ceil(min);
	max = Math.floor(max);
	return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
}

function playerMove(playingField, rowIndex, cellIndex, state) {
	return playingField.map((rowState, index) => {
		if (rowIndex === index)
		{
			return rowState.map((cellState, index) => {
				if (cellIndex === index)
				{
					return state
				}
				return cellState
			})
		}
		return rowState
	})
}

function computerMove(playingField) {
	const availableCoordinates = []
	playingField.forEach((rowState, rowIndex) => {
		rowState.forEach((cellState, cellIndex) => {
			if (!cellState)
			{
				availableCoordinates.push([rowIndex, cellIndex])
			}
		})
	});
	if (!availableCoordinates.length)
	{
		return playingField
	}
	const randomIndex = getRandomInt(0, availableCoordinates.length)
	const [rowIndex, cellIndex] = availableCoordinates[randomIndex]
	return playerMove(playingField, rowIndex, cellIndex, '0')
}

function getWinnerCoordinatesByRows(playingField, player) {
	if (playingField[0][0] === playingField[0][1] && 
		playingField[0][1] === playingField[0][2] && 
		playingField[0][2] === player)
	{
		return {
			type: 'row',
			coordinates: [[0, 0], [0, 1], [0, 2]],
		}
	}
	if (playingField[1][0] === playingField[1][1] &&
		playingField[1][1] === playingField[1][2] &&
		playingField[1][2] === player)
	{
		return {
			type: 'row',
			coordinates: [[1, 0], [1, 1], [1, 2]],
		}
	}

	if (playingField[2][0] === playingField[2][1] && 
		playingField[2][1] === playingField[2][2] &&
		playingField[2][2] === player)
	{
		return {
			type: 'row',
			coordinates: [[2, 0], [2, 1], [2, 2]],
		}
	}
	return null
}

function getWinnerCoordinatesByColumns(playingField, player) {
	if (playingField[0][0] === playingField[1][0] && 
		playingField[1][0] === playingField[2][0] &&
		playingField[2][0] === player)
	{
		return {
			type: 'column',
			coordinates: [[0, 0], [1, 1], [2, 0]],
		}
	}

	if (playingField[0][1] === playingField[1][1] && 
		playingField[1][1] === playingField[2][1] && 
		playingField[2][1] === player)
	{
		return {
			type: 'column',
			coordinates: [[0, 1], [1, 1], [2, 1]],
		}
	}

	if (playingField[0][2] === playingField[1][2] &&
		playingField[1][2] === playingField[2][2] &&
		playingField[2][2] === player)
	{
		return {
			type: 'column',
			coordinates: [[0, 2], [1, 2], [2, 2]],
		}
	}
	return null
}

function getWinnerCoordinatesByDiagonals(playingField, player) {
	if (playingField[0][0] === playingField[1][1] &&
		playingField[1][1] === playingField[2][2] && 
		playingField[2][2] === player)
	{
		return {
			type: 'diagonal1',
			coordinates: [[0, 0], [1, 1], [2, 2]],
		}
	}

	if (playingField[0][2] === playingField[1][1] && 
		playingField[1][1] === playingField[2][0] && 
		playingField[2][0] === player)
	{
		return {
			type: 'diagonal2',
			coordinates: [[0, 2], [1, 1], [2, 0]]
		}
	}
	return null
}

function getWinnerData(playingField, player) {
	return getWinnerCoordinatesByRows(playingField, player) ||
		getWinnerCoordinatesByColumns(playingField, player) ||
		getWinnerCoordinatesByDiagonals(playingField, player)
}

/**
 * @return {{
 *   gameState: GameState,
 *   setCellState: function({rowIndex: number, cellIndex: number, state: CellState}):void,
 * }}
 */
function useGameState() {
	const context = useContext(GameStateContext)
	if (!context) {
		throw new Error(`useGameState must be used within a CountProvider`)
	}
	const [gameState, setGameState] = context
	const setCellState = ({rowIndex, cellIndex, state}) => {
		let winner = null
		let playingField = playerMove(gameState.playingField, rowIndex, cellIndex, state)
		const winnerData = getWinnerData(playingField, 'x')
		if (winnerData)
		{
			winner = {
				player: 'x',
				...winnerData,
			}
		}
		else
		{
			playingField = computerMove(playingField)
			const winnerData = getWinnerData(playingField, '0')
			if (winnerData)
			{
				winner = {
					player: '0',
					...winnerData,
				}
			}
		}
		
		setGameState({
			...gameState,
			playingField,
			winner,
		})
	}
	const restart = () => setGameState(initialGameState)
	return {
		gameState,
		setCellState,
		restart,
	}
}

export {
	useGameState,
}