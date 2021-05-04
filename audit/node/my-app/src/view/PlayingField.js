import React from 'react'
import { useGameState } from '../model/useGameState'
import './PlayingField.css'

function getWinnerCellModifier(winner, state, rowIndex, cellIndex) {
    if (!winner)
    {
        return null
    }
    const {player, coordinates} = winner
    if (player !== state)
    {
        return null
    }
    let modifier = null
    coordinates.forEach(coordinate => {
        if (rowIndex === coordinate[0] && cellIndex === coordinate[1])
        {
            modifier = winner.type
        }
    });
    return modifier
}

/**
 * @param {{
 *    state: cellState,
 *    rowIndex: number,
 *    cellIndex: number,
 * }} param0
 */
function Cell({state, rowIndex, cellIndex}) {
    const {gameState, setCellState} = useGameState()
    const winner = gameState.winner
    function onClick() {
        if (state || winner)
        {
            return
        }
        setCellState({rowIndex, cellIndex, state: 'x'})
    }
   
    let className = 'cell'
    if (state)
    {
        className += ` cell_${state}`
        if (state === '0')
        {
            className += ' cell_with-show-animation'
        }
        const modifier = getWinnerCellModifier(winner, state, rowIndex, cellIndex)
        if (modifier)
        {
            className += ` cell_${modifier}`
        }
    }
    return (
        <div onClick={onClick} className={className}></div>
    )
}

/**
 * @param {{
    *    state: Array<CellState>
    *    rowIndex: number,
    * }} param0
    */
function Row({state, rowIndex}) {
    const cells = state.map((cellState, index) =>
        <Cell key={index} state={cellState} rowIndex={rowIndex} cellIndex={index}></Cell>
    )
    return (
        <div className='row'>{cells}</div>
    )
}

function PlayingField(){
    const {gameState} = useGameState()
    const rows = gameState.playingField.map((rowState, index) =>
        <Row key={index} state={rowState} rowIndex={index}></Row>
    )
    return (
        <div className='field'>{rows}</div>
    )
}

export {
    PlayingField,
}