import { Fragment } from 'react'
import './index.css'

import { useQuery } from '@tanstack/react-query'
import { api } from '../api/api'

export default function Page() {
  const { isLoading, isError, data } = useQuery({
    queryKey: ['pets'],
    queryFn: async () => {
      try {
        const { data } = await api.get('/pet')

        return data
      } catch (error) {
        throw new Error(error as any)
      }
    }
  })

  if (isLoading) {
    return <h1>loading...</h1>
  }

  if (isError) {
    return <h1>error...</h1>
  }

  console.log({ data })

  return (
    <Fragment>
      <h1> Pets </h1>

      {data.map((pet: any) => {
        return (
          <div>
            <strong>✨ nome: {pet.name}</strong>{' '}
            <strong>✨ tipo: {pet.type}</strong>{' '}
          </div>
        )
      })}
    </Fragment>
  )
}