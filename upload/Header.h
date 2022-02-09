
typedef struct Queue
{
    int size;
	struct Node * front;
	struct Node * rear;

}Queue;

typedef struct Node
{
	int data;
	struct Node * next;
	struct Node * prev;
}Node;


Queue * initQueue();

Node * initNode(int data, Node *prev);

void enqueue(Queue *a, int data);

int isEmpty(Queue *a);

int dequeue(Queue *a);

void dequeueALL(Queue * a);

void deleteQ(Queue *a);

void printALL(Queue *a);

int isFull(Queue *a);



