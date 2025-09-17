import React from 'react'

export default function Documents({ documents }) {
  return (
    <div className="bg-white rounded-xl shadow p-6">
      <h2 className="text-lg font-semibold mb-4">📑 All Documents in Organization</h2>
      <ul className="divide-y">
        {documents.map(d => (
          <li key={d.id} className="py-2 flex justify-between">
            <span>
              <b>{d.name}</b> <span className="text-gray-500">({d.owner.name})</span>
            </span>
            <a href={route('documents.download', d.id)}
               className="text-sm text-indigo-600 hover:underline">Download</a>
          </li>
        ))}
      </ul>
    </div>
  )
}
