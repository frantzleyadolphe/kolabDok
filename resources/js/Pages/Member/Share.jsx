import React from 'react'
import { useForm } from '@inertiajs/react'

export default function Share({ document, members }) {
  const { data, setData, post, processing } = useForm({
    user_id: '',
  })

  function submit(e) {
    e.preventDefault()
    post(route('documents.share', document.id))
  }

  return (
    <div className="max-w-lg mx-auto bg-white rounded-xl shadow p-6">
      <h2 className="text-lg font-semibold mb-4">🔗 Share {document.name}</h2>

      <form onSubmit={submit} className="space-y-4">
        <select value={data.user_id} onChange={e => setData('user_id', e.target.value)}
          className="w-full border rounded p-2">
          <option value="">Select member (optional)</option>
          {members.map(m => (
            <option key={m.id} value={m.id}>{m.name}</option>
          ))}
        </select>

        <button disabled={processing}
          className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
          Generate Share Code
        </button>
      </form>
    </div>
  )
}
