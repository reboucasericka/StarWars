
## API - Documentação

A API foi desenvolvida para fornecer dados relacionados ao universo Star Wars. Aqui estão os endpoints disponíveis:

---

## **Filmes**
### Endpoint: `GET /api/films.php`
- **Descrição**: Retorna todos os filmes.
- **Parâmetros**: Nenhum.
- **Exemplo de Resposta**:
  ```json
  [
    {
      "title": "Revenge of the Sith",
      "episode_id": 3,
      "release_date": "2005-05-19",
      "director": "George Lucas",
      "producer": "Rick McCallum"
    }
  ]