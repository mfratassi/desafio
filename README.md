<p align=""><a href="https://laravel.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/179/179323.png" width="120"></a></p>

## About

This is just a simple test

## Usage

#### 1. Cidades
- ##### Básico 
    ![image](https://user-images.githubusercontent.com/26194769/136842409-d982cc54-e50d-4652-9ee4-6c1e6cb5b3ca.png)

#### 2. Estados
- ##### Básico 
    ![image](https://user-images.githubusercontent.com/26194769/136842463-67341f51-e5cb-46d7-b5fb-e99a434c0235.png)

#### 3. Produtos
- ##### Básico 
    ![image](https://user-images.githubusercontent.com/26194769/136842541-4713330f-b3f7-463d-8d1c-6493b291d36d.png)
    
#### 4. Descontos
- ##### Básico 
    ![image](https://user-images.githubusercontent.com/26194769/136842577-51083dbc-c496-449d-b2dd-bf0c0791698c.png)

#### 5. Grupos (de cidades)
- ##### Básico
    ![image](https://user-images.githubusercontent.com/26194769/136842694-bf158dab-345b-42e6-ac01-0f8fa0178472.png)
- ##### Adiciona uma campanha a um grupo
    [POST] api/grupos/{grupo}/adicionar_campanha/{campanha}
- ##### Remove uma campanha de um grupo
    [POST] api/grupos/{grupo}/remover_campanha
- ##### Adiciona uma cidade a um grupo
    [POST] api/grupos/{grupo}/adicionar_cidade/{cidade}
- ##### Remove uma cidade de um grupo
    [POST] api/grupos/{grupo}/remover_cidade/{cidade}
 
#### 6. Campanhas
- ##### Básico 

    ![image](https://user-images.githubusercontent.com/26194769/136842015-78da0ecd-e22e-43dc-becd-f6408a111d5c.png)

- ##### Adiciona um produto a uma campanha
    [POST] api/campanhas/{campanha}/adicionar_produto/{produto} <br/>
    
    Opcional: float @desconto 
- ##### Aplica desconto a um produto dentro de uma campanha
    [POST] api/campanhas/{campanha}/produto/{produto}/adicionar_desconto  <br/>
    
    Param float @valor   
- ##### Remove um produto de uma campanha
    [POST] api/campanhas/{campanha}/remover_produto/{produto}
- ##### Subtrai uma unidade de um produto de uma campanha
    [POST] api/campanhas/{campanha}/subtrair_produto/{produto}

## ERM
![erm](https://user-images.githubusercontent.com/26194769/136843995-fe934329-15e2-4ff8-99cb-872a5797500b.png)

