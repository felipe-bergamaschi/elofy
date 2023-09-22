import { Fragment } from 'react'
import './index.css'

export default function Page() {
  const data = ['Anilina', 'Arara', 'Manuel', 'Felipe']

  function handleData() {
    return data.map((name) => {
      const letter = []
      const palin = []

      for (let index = 0; index < name.length; index++) {
        letter.push(name.substring(index + 1, index))
      }

      for (let index = 1; index <= letter.length; index++) {
        const getLetter = letter[letter.length - index]

        const text = index === 1 ? getLetter.toUpperCase() : index === letter.length ? getLetter.toLowerCase() : getLetter

        palin.push(text)
      }

      return palin.join('')
    })
  }

  return (
    <Fragment>
      {handleData().map((item, index) => {
        const check = Boolean(item === data[index]).toString()

        return (
          <div>
            <div>
              Nome: {item}
            </div>

            <div>
              Igual: {check}
            </div>

            <br />
          </div>
        )
      })}
    </Fragment>
  )
}