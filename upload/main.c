#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <stddef.h> // Zbog NULL - UNDECLARED

	// 2 strukture -> 1 signalizira RED OVA PRVA JE RED, ZA DRUGU STRUKTURU - 2LISTA
	// KOD ALOCIRANJA MEMORIJE ONDA ALOCIRATI SAMO RED
 	 // KOD DODAVANJA CVOROVA ALOCIRATI ZA SVAKI DODANI CVOR
	// KOD BRISANJA POJEDINACNIH ELEMENTA BRISATI TJ. FREE ALOCIRANU MEMORIJU JEDNOG CVORA
	// KOD BRISANJA CITAVE LISTE - FREE POJEDINACNE SVE CVOROVE ONDA RED
int main(){

    Queue *a = initQueue();

	enqueue(a, 132);
	enqueue(a, 11);
	enqueue(a, 44);
	enqueue(a, 524);
	enqueue(a, 23);
	printALL(a);
	printf("Removed node:\n %d\n", dequeue(a));
	printf("Removed node:\n %d\n", dequeue(a));
	printALL(a);
	printf("Size is:\n %d\n",a->size);
	dequeueALL(a);
	printALL(a);
	enqueue(a, 132);
		enqueue(a, 11);
		enqueue(a, 44);
		enqueue(a, 524);
		enqueue(a, 23);
		printALL(a);
    /*dequeueALL(a);
    enqueue(a, 14);
    enqueue(a, 16);
    printf("Size is after dequeue all:\n %d\n",a->size);
	printALL(a);*/
	int result;
	int result2=1;

	int mathQ(Queue *a){
	Node * node = a->rear;
	printf("Odaberite matematičku operaciju sa svim elementima u redu.\n");
	int num;
	printf("Unesite broj [1,4] - 1:ZBRAJANJE, 2:ODUZIMANJE, 3: MNOZENJE 4:DIJELJENJE\n");
	scanf("%d",&num);
	while(num>4 || num<1){
		printf("Uneseni broj nije u intervalu\n");
		scanf("%d",&num);
	}
	  if(num==1){
		  while(node!=NULL){

			  result=result+(node->data);
			  node = node->next;
		  }
		  printf("Broj je %d", result);
		  return result;
	  }
	  if(num==2){
	  		  while(node!=NULL){

	  			  result=result-(node->data);
	  			  node = node->next;
	  		  }
	  		  printf("Broj je %d", result);
	  		  return result;
	  	  }
	  if(num==3){
	  		  while(node!=NULL){

	  			  result2=result2*(node->data);
	  			  node = node->next;
	  		  }
	  		  printf("Broj je %d", result2);
	  		  return result2;
	  	  }
	  if(num==4){
	  		  while(node!=NULL){

	  			  result2=result2/(node->data);
	  			  node = node->next;
	  		  }
	  		  printf("Broj je %d", result2);
	  		  return result2;
	  	  }
	}

  	mathQ(a);
	return 0;

	/*int size;
	printf("Type the size of queue :");
	scanf("%d",size);
	printf("Test");*/

	/*Queue * initializeQ(){
		Queue * a=(struct Queue*)malloc(sizeof(struct Queue)*(a->size));
			if (a == NULL)
			{
				return NULL;
			}
			a->front = NULL;
			a->rear = NULL;
			return a;
	}

	Node * initializeN(int data, Node * prev)
	{

		Node * a = (Node*)malloc(sizeof(Node));
		if (a == NULL)
		{

			return NULL;
		}
		a->data = data;
		a->next = NULL;
		a->prev = prev;
		return a;
	}


	void enqueue(Queue* a, int data)
	{

		Node* node = initializeN(data, a->front);
		if (a->front == NULL)
		{

			a->front = node;
			a->size = 1;
		}
		else
		{
			a->front->next = node;
			a->size = a->size + 1;
		}
		a->front = node;
	}


    int isEmpty(Queue *a)
		{
			if (a->size == 0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}


    void dequeue(Queue * a)
    {
        if (isEmpty(a) == 1)
            {

                printf("Queue is empty - you can't remove elements");
            }
        else
            {
                                         //int data = a->front->data; // Uzmi vrijednost sa prednjeg Queue-a i spremi ju pod varijablu data
                Node * temp = a->front;  // Inicijaliziraj novi èvor koji je jednak a->front-u
                if (a->front == a->rear) // Ako su null to znaci da QUEUE ima samo jedan NODE unutra
                {
                    a->rear=NULL;
                    a->front=NULL;
                }
                else
                {
                                         //a->front = a->front->next;
                                         //a->front->prev = NULL;
                                         ////a->rear->next=a->front->prev;
                                         ////a->front->prev = NULL;
                                         //
                    a->front=a->front->prev;
                    a->front->next = NULL;
                    free(a->front->next);// JEL IDE FREE OVDJE? Ja mislim da da jer ce se koristiti u iducim funkcijama za brisanje
                }
                                         // Change queue size
                a->size--;
            }
    }


    void dequeueALL(Queue * a)
    {
        if (isEmpty(a) == 1)
            {

                printf("Queue is empty - you can't remove elements");
            }
        else{
            while(a->size!=0){
                dequeue(a);
            }
        }


    }


    void deleteQ(Queue *a){
        dequeueALL(a);
        free(a);
    }


    void printdata(Queue * a)
        {
            Node * node = a->front;
            printf("Element\n:");
            while (node != NULL)
            {
                printf(" %d\n", node->data);
                node = node->next;
            }
            printf("\n");
        }

    }

    int isFull(Queue *a){

        Node * node = a->front;
        int cnt;
        if(isEmpty(a)==1){
            return 0;
        }
        else{
            while(node!=NULL){
                node = node->next;
                cnt++;
            }
            if(cnt==a->size){
                return 1;
            }
            else{
                return 0;
            }
        }
    } */

}
